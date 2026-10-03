<?php
/**
 * Small view helpers shared by every component.
 */

/** Escape a value for HTML output. */
function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/** Inline SVG pointing at a symbol in the shared sprite (components/icons.php). */
function icon(string $name, string $class = ''): string
{
    $class = $class !== '' ? ' class="' . e($class) . '"' : '';
    return '<svg' . $class . ' aria-hidden="true"><use href="#i-' . e($name) . '"/></svg>';
}

/** tel: target from a display number: "+91 86883 71118" -> "+918688371118". */
function tel(string $number): string
{
    return preg_replace('/[^\d+]/', '', $number);
}

/** WhatsApp chat link with an optional pre-filled message. */
function whatsapp_link(string $number, string $message = ''): string
{
    $url = 'https://wa.me/' . ltrim(tel($number), '+');
    return $message !== '' ? $url . '?text=' . rawurlencode($message) : $url;
}

/** Link to a section of the home page; stays a plain #id when already on it. */
function anchor(string $id): string
{
    $onHome = ($GLOBALS['activePage'] ?? 'home') === 'home';
    return ($onHome ? '' : 'index.php') . '#' . $id;
}

/** "17:00" -> "5 PM", "09:30" -> "9:30 AM". */
function format_time(string $time): string
{
    [$h, $m] = array_map('intval', explode(':', $time));
    $suffix = $h >= 12 ? 'PM' : 'AM';
    $h = $h % 12 ?: 12;
    return $h . ($m ? ':' . sprintf('%02d', $m) : '') . ' ' . $suffix;
}

/** Opening slots of one hours group: "9 AM – 1 PM, 5 PM – 9 PM". */
function format_slots(array $slots): string
{
    return implode(', ', array_map(function ($slot) {
        return format_time($slot[0]) . ' – ' . format_time($slot[1]);
    }, $slots));
}

/** Absolute URL from a site-relative path when $site['url'] is set, else null. */
function absolute_url(string $path = ''): ?string
{
    $base = rtrim($GLOBALS['site']['url'] ?? '', '/');
    return $base !== '' ? $base . '/' . ltrim($path, '/') : null;
}
