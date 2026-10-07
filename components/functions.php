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

/**
 * Where "Book appointment" buttons go: the booking form on the same page on
 * the home and free-appointment pages, otherwise the free-appointment page.
 */
function booking_url(): string
{
    $page = $GLOBALS['activePage'] ?? 'home';
    return in_array($page, ['home', 'free-appointment'], true) ? '#appointment' : 'free-appointment.php';
}

/** Treatment choices of the booking forms (and what appointment.php accepts). */
function booking_treatments(): array
{
    return array_merge(array_column($GLOBALS['treatments'], 'name'), $GLOBALS['bookingExtraOptions']);
}

/**
 * Breadcrumb trail for a page id from $nav, top level or child:
 *   'about'   -> [About Us]
 *   'doctors' -> [About Us, Dr. Y. Abhilash (PT)]
 * Each crumb is ['label' => ..., 'url' => ...]. Home is not included.
 */
function nav_trail(string $id): array
{
    foreach ($GLOBALS['nav'] ?? [] as $item) {
        if ($item['id'] === $id) {
            return [['label' => $item['label'], 'url' => $item['url']]];
        }
        foreach ($item['children'] ?? [] as $child) {
            if (($child['id'] ?? null) === $id) {
                return [
                    ['label' => $item['label'], 'url' => $item['url']],
                    ['label' => $child['label'], 'url' => $child['url']],
                ];
            }
        }
    }
    return [];
}

/** True when $item, or one of its children, is the current page. */
function nav_is_active(array $item, string $activePage): bool
{
    if ($item['id'] === $activePage) {
        return true;
    }
    foreach ($item['children'] ?? [] as $child) {
        if (($child['id'] ?? null) === $activePage) {
            return true;
        }
    }
    return false;
}

/** URL-safe id from text: "Is physiotherapy painful?" -> "is-physiotherapy-painful". */
function slugify(string $text): string
{
    $text = strtolower(str_replace("'", '', $text));
    return trim(preg_replace('/[^a-z0-9]+/', '-', $text), '-');
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

/** Contact form subjects: page subjects + every speciality + "Other". */
function contact_subjects(): array
{
    return array_merge(
        $GLOBALS['contactPage']['form']['subjects'],
        array_column($GLOBALS['specialities'], 'name'),
        ['Other']
    );
}

/** Google Maps search text for the clinic: $site['map']['query'], else name + address. */
function map_query(): string
{
    $site = $GLOBALS['site'];
    $address = implode(', ', array_filter([
        $site['address']['street'],
        $site['address']['city'],
        $site['address']['region'],
        $site['address']['postal_code'],
    ]));
    return $site['map']['query'] ?: $site['name'] . ', ' . $address;
}

/** Google Maps directions link to the clinic. */
function map_directions_url(): string
{
    return 'https://www.google.com/maps/dir/?api=1&destination=' . rawurlencode(map_query());
}
