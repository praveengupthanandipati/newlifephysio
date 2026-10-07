<?php
/**
 * Shared by the form handlers (contact-submit.php, appointment.php):
 * replying to the browser and emailing the clinic.
 */

/**
 * Ends the request with { status, message, errors? }: JSON for the fetch()
 * submit in js/custom.js, or a short HTML page when JavaScript is off.
 */
function form_respond(array $data, string $backUrl): void
{
    if (($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '') === 'XMLHttpRequest') {
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($data);
    } else {
        header('Content-Type: text/html; charset=UTF-8');
        echo '<!doctype html><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">'
            . '<title>' . e($GLOBALS['site']['name']) . '</title>'
            . '<p style="font-family:sans-serif;max-width:560px;margin:3rem auto;padding:0 1rem">'
            . e($data['message']) . '<br><br><a href="' . e($backUrl) . '">&larr; Go back</a></p>';
    }
    exit;
}

/** Rejects anything but POST, bots (honeypot) and repeat sends within 30 s. */
function form_guard(string $key, string $backUrl): void
{
    if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
        http_response_code(405);
        header('Allow: POST');
        form_respond(['status' => 'error', 'message' => 'Please use the form on our website.'], $backUrl);
    }
    // honeypot filled in: a bot. Pretend it worked so it doesn't retry.
    if (trim($_POST['website'] ?? '') !== '') {
        form_respond(['status' => 'success', 'message' => 'Thank you! Your request has been sent.'], $backUrl);
    }
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if (isset($_SESSION[$key]) && time() - $_SESSION[$key] < 30) {
        form_respond(['status' => 'error', 'message' => 'You have just sent this form. Please wait a moment before sending it again.'], $backUrl);
    }
}

/** Marks a successful send for form_guard()'s rate limit. */
function form_sent(string $key): void
{
    $_SESSION[$key] = time();
}

/** Trimmed single-line POST value, cut to $max characters. */
function form_value(string $key, int $max): string
{
    $value = trim((string) ($_POST[$key] ?? ''));
    return mb_substr(preg_replace('/\s+/u', ' ', $value), 0, $max);
}

/** Validation shared by both forms; each returns an error message or null. */
function validate_name(string $v): ?string
{
    if ($v === '') return 'Please enter your name.';
    if (mb_strlen($v) < 2 || !preg_match("/^\p{L}[\p{L}\s.'-]*$/u", $v)) return 'Please enter a valid name (letters only, 2-80 characters).';
    return null;
}

/** Indian mobile without +91 / 0 prefix and separators, or null when invalid. */
function normalise_mobile(string $v): ?string
{
    $digits = preg_replace('/^(?:\+?91|0)(?=\d{10}$)/', '', preg_replace('/[\s().-]/', '', $v));
    return preg_match('/^[6-9]\d{9}$/', $digits) ? $digits : null;
}

/**
 * Emails the clinic ($site['email']). Returns false when no address is set
 * yet or the server could not send.
 */
function send_site_mail(string $subject, string $body, string $replyName = '', string $replyEmail = ''): bool
{
    $site = $GLOBALS['site'];
    if ($site['email'] === '') {
        return false; // TODO: set $site['email'] in data.php to receive form messages
    }
    $oneLine = function ($v) {
        return str_replace(["\r", "\n"], ' ', $v);
    };
    $host = parse_url(absolute_url() ?? '', PHP_URL_HOST) ?: preg_replace('/:\d+$/', '', $_SERVER['HTTP_HOST'] ?? 'localhost');

    $headers = [
        'From: ' . $oneLine($site['name']) . ' Website <no-reply@' . $host . '>',
        'Content-Type: text/plain; charset=UTF-8',
    ];
    if ($replyEmail !== '') {
        $headers[] = 'Reply-To: ' . $oneLine($replyName) . ' <' . $oneLine($replyEmail) . '>';
    }
    $body .= "\n-- Sent " . date('d M Y, h:i A') . ' from ' . ($_SERVER['REMOTE_ADDR'] ?? 'unknown IP') . "\n";

    return @mail($site['email'], '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, implode("\r\n", $headers));
}
