<?php
/**
 * Free consultation booking handler. Two forms post here (via fetch in
 * js/custom.js): the short home page form (name, phone, treatment, city) and
 * the full form on free-appointment.php (source=page), which adds patient
 * type, preferred date / time, email, notes and consent.
 * Re-validates everything and emails the request to $site['email'].
 */
$page = 'free-appointment';
require __DIR__ . '/components/init.php';
require __DIR__ . '/components/mailer.php';

/** @var array $site */

$fullForm = ($_POST['source'] ?? '') === 'page';
$back = $fullForm ? 'free-appointment.php' : 'index.php#appointment';
form_guard('appointment_sent_at', $back);

// ---------- Validation (mirrors js/custom.js) ----------
$name = form_value('name', 80);
$phone = form_value('phone', 20);
$treatment = form_value('treatment', 120);
$city = form_value('city', 60);
$email = form_value('email', 120);
$patient = form_value('patient', 10);
$date = form_value('date', 10);
$slot = form_value('slot', 11);
$notes = mb_substr(trim((string) ($_POST['notes'] ?? '')), 0, 500);

$errors = array_filter([
    'name'      => validate_name($name),
    'phone'     => $phone === '' ? 'Please enter your mobile number.'
        : (normalise_mobile($phone) === null ? 'Please enter a valid 10 digit mobile number.' : null),
    'treatment' => in_array($treatment, booking_treatments(), true) ? null : 'Please select a disease or treatment.',
    'city'      => in_array($city, $site['cities'], true) ? null : 'Please select your city.',
]);

$slotLabel = '';
if ($fullForm) {
    if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address, or leave it empty.';
    }
    if (!in_array($patient, ['adult', 'child'], true)) {
        $errors['patient'] = 'Please choose who the appointment is for.';
    }

    // Preferred date: today up to 60 days ahead, on a day the clinic is open
    $tz = new DateTimeZone('Asia/Kolkata');
    $day = DateTime::createFromFormat('!Y-m-d', $date, $tz);
    $today = new DateTime('today', $tz);
    $slotsForDay = [];
    if (!$day || $day->format('Y-m-d') !== $date) {
        $errors['date'] = 'Please choose your preferred date.';
    } elseif ($day < $today || $day > (clone $today)->modify('+60 days')) {
        $errors['date'] = 'Please choose a date within the next 60 days.';
    } else {
        foreach ($site['hours'] as $group) {
            if (in_array($day->format('l'), $group['days'], true)) {
                $slotsForDay = $group['slots'];
            }
        }
        if (!$slotsForDay) {
            $errors['date'] = 'The clinic is closed on that day. Please choose another date.';
        }
    }

    // Preferred time: one of that day's opening slots, e.g. "17:00-21:00"
    if (!isset($errors['date'])) {
        foreach ($slotsForDay as $s) {
            if ($slot === $s[0] . '-' . $s[1]) {
                $slotLabel = format_slots([$s]);
            }
        }
        if ($slotLabel === '') {
            $errors['slot'] = 'Please choose a preferred time.';
        }
    }

    if (empty($_POST['consent'])) {
        $errors['consent'] = 'Please agree so we can contact you.';
    }
}

if ($errors) {
    form_respond(['status' => 'error', 'message' => 'Please correct the highlighted fields.', 'errors' => $errors], $back);
}

// ---------- Send ----------
$body = "New free consultation request\n\n"
    . "Name:       $name\n"
    . 'Mobile:     +91 ' . normalise_mobile($phone) . "\n"
    . "Treatment:  $treatment\n"
    . "City:       $city\n";
if ($fullForm) {
    $body .= 'Patient:    ' . ucfirst($patient) . "\n"
        . 'Preferred:  ' . $day->format('l, d M Y') . ", $slotLabel\n"
        . 'Email:      ' . ($email ?: '-') . "\n\n"
        . "Notes:\n" . ($notes ?: '-') . "\n";
} else {
    $body .= "\n(Sent from the home page quick booking form)\n";
}

if (!send_site_mail('Free consultation request - ' . $name . ' (' . $treatment . ')', $body, $name, $email)) {
    form_respond(['status' => 'error', 'message' => 'Sorry, your booking could not be sent right now. Please call or WhatsApp us on ' . $site['phones'][0] . '.'], $back);
}

form_sent('appointment_sent_at');
form_respond(['status' => 'success', 'message' => 'Thank you, ' . $name . '! Your request has been received. We will call you shortly to confirm your appointment time.'], $back);
