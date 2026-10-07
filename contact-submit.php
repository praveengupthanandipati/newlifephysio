<?php
/**
 * Contact form handler (contact.php → js/custom.js posts here with fetch).
 * Re-validates every field, drops spam (honeypot + rate limit) and emails the
 * enquiry to $site['email']. Replies with JSON:
 *   { status: 'success' | 'error', message: '...', errors?: { field: '...' } }
 * Without JavaScript the form posts normally and gets a short HTML page.
 */
$page = 'contact';
require __DIR__ . '/components/init.php';
require __DIR__ . '/components/mailer.php';

/** @var array $site */

$back = 'contact.php';
form_guard('contact_sent_at', $back);

// ---------- Validation (mirrors js/custom.js) ----------
$name = form_value('name', 80);
$phone = form_value('phone', 20);
$email = form_value('email', 120);
$subject = form_value('subject', 120);
$message = mb_substr(trim((string) ($_POST['message'] ?? '')), 0, 1000);

$errors = array_filter([
    'name'  => validate_name($name),
    'phone' => $phone === '' ? 'Please enter your mobile number.'
        : (normalise_mobile($phone) === null ? 'Please enter a valid 10 digit mobile number.' : null),
    'email' => $email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)
        ? 'Please enter a valid email address, or leave it empty.' : null,
    'subject' => in_array($subject, contact_subjects(), true) ? null : 'Please select a subject.',
    'message' => $message === '' ? 'Please enter your message.'
        : (mb_strlen($message) < 10 ? 'Please write at least 10 characters.' : null),
    'consent' => empty($_POST['consent']) ? 'Please agree so we can contact you.' : null,
]);

if ($errors) {
    form_respond(['status' => 'error', 'message' => 'Please correct the highlighted fields.', 'errors' => $errors], $back);
}

// ---------- Send ----------
$body = "New enquiry from the website contact form\n\n"
    . "Name:    $name\n"
    . 'Mobile:  +91 ' . normalise_mobile($phone) . "\n"
    . 'Email:   ' . ($email ?: '-') . "\n"
    . "Subject: $subject\n\n"
    . "Message:\n$message\n";

if (!send_site_mail('Website enquiry: ' . $subject . ' - ' . $name, $body, $name, $email)) {
    form_respond(['status' => 'error', 'message' => 'Sorry, your message could not be sent right now. Please call or WhatsApp us on ' . $site['phones'][0] . '.'], $back);
}

form_sent('contact_sent_at');
form_respond(['status' => 'success', 'message' => 'Thank you, ' . $name . '! Your message has been sent. We will call you back soon.'], $back);
