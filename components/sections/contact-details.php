<?php
/**
 * Contact page: contact cards, enquiry form (js/custom.js validates and posts
 * it to contact-submit.php), clinic timings with a live open / closed badge,
 * and a Google Map. All details come from $site, wording from $contactPage.
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $site */
/** @var array $contactPage */
/** @var array $specialities */

$addressLine = implode(', ', array_filter([
    $site['address']['street'],
    $site['address']['city'],
    $site['address']['region'],
    $site['address']['postal_code'],
]));
$mapQuery = map_query();
$mapEmbed = 'https://www.google.com/maps?q=' . rawurlencode($mapQuery) . '&output=embed';
$mapDirections = map_directions_url();

// One row per weekday, Monday first, from the hours groups
$weekdays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
$slotsByDay = [];
foreach ($site['hours'] as $group) {
    foreach ($group['days'] as $day) {
        $slotsByDay[$day] = $group['slots'];
    }
}

$subjects = contact_subjects(); // same list contact-submit.php accepts
?>
<!-- contact cards -->
<section class="ct-info" aria-label="Contact details">
    <div class="container-90">
        <ul class="ct-cards">
            <li class="ct-card" data-aos="fade-up">
                <span class="ct-card__icon" aria-hidden="true"><?= icon('phone') ?></span>
                <h2>Call Us</h2>
<?php foreach ($site['phones'] as $phone): ?>
                <a href="tel:<?= e(tel($phone)) ?>"><?= e($phone) ?></a>
<?php endforeach; ?>
            </li>
            <li class="ct-card ct-card--wa" data-aos="fade-up" data-aos-delay="80">
                <span class="ct-card__icon" aria-hidden="true"><?= icon('whatsapp') ?></span>
                <h2>WhatsApp</h2>
                <a href="<?= e(whatsapp_link($site['whatsapp'], $site['whatsapp_messages']['book'])) ?>" target="_blank" rel="noopener"><?= e($site['whatsapp']) ?></a>
                <small>Quick replies during clinic hours</small>
            </li>
<?php if ($site['email'] !== ''): ?>
            <li class="ct-card" data-aos="fade-up" data-aos-delay="160">
                <span class="ct-card__icon" aria-hidden="true"><?= icon('mail') ?></span>
                <h2>Email Us</h2>
                <a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a>
                <small>We reply within one working day</small>
            </li>
<?php endif; ?>
            <li class="ct-card" data-aos="fade-up" data-aos-delay="240">
                <span class="ct-card__icon" aria-hidden="true"><?= icon('map-pin') ?></span>
                <h2>Visit Us</h2>
                <address><?= e($site['name']) ?><br><?= e($addressLine) ?></address>
                <a class="ct-card__link" href="<?= e($mapDirections) ?>" target="_blank" rel="noopener">Get directions <?= icon('arrow') ?></a>
            </li>
        </ul>
    </div>
</section>
<!--/ contact cards -->

<!-- form + timings -->
<section class="ct-main" aria-labelledby="ctFormTitle">
    <div class="container-90">
        <div class="row g-4 g-xl-5">
            <!-- form -->
            <div class="col-lg-7">
                <div class="ct-form-box" data-aos="fade-up">
                    <span class="svc-eyebrow"><?= e($contactPage['form']['eyebrow']) ?></span>
                    <h2 class="svc-title" id="ctFormTitle"><?= e($contactPage['form']['title']) ?> <span><?= e($contactPage['form']['highlight']) ?></span></h2>
                    <p class="svc-lead"><?= e($contactPage['form']['lead']) ?></p>

                    <form class="ct-form" id="contactForm" action="contact-submit.php" method="post" novalidate>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="ct-label" for="ctName">Full name <span aria-hidden="true">*</span></label>
                                <input class="form-control ct-input" id="ctName" type="text" name="name" placeholder="Your full name" autocomplete="name" maxlength="80" required aria-describedby="ctNameErr">
                                <div class="hero-field__error" id="ctNameErr" data-error-for="name"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="ct-label" for="ctPhone">Mobile number <span aria-hidden="true">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text ct-prefix">+91</span>
                                    <input class="form-control ct-input" id="ctPhone" type="tel" name="phone" placeholder="10 digit mobile number" autocomplete="tel-national" inputmode="numeric" maxlength="15" required aria-describedby="ctPhoneErr">
                                </div>
                                <div class="hero-field__error" id="ctPhoneErr" data-error-for="phone"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="ct-label" for="ctEmail">Email <small>(optional)</small></label>
                                <input class="form-control ct-input" id="ctEmail" type="email" name="email" placeholder="you@example.com" autocomplete="email" maxlength="120" aria-describedby="ctEmailErr">
                                <div class="hero-field__error" id="ctEmailErr" data-error-for="email"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="ct-label" for="ctSubject">Subject <span aria-hidden="true">*</span></label>
                                <select class="form-select ct-input" id="ctSubject" name="subject" required aria-describedby="ctSubjectErr">
                                    <option value="">Select a subject</option>
<?php foreach ($subjects as $subject): ?>
                                    <option><?= e($subject) ?></option>
<?php endforeach; ?>
                                </select>
                                <div class="hero-field__error" id="ctSubjectErr" data-error-for="subject"></div>
                            </div>
                            <div class="col-12">
                                <label class="ct-label" for="ctMessage">Message <span aria-hidden="true">*</span></label>
                                <textarea class="form-control ct-input" id="ctMessage" name="message" rows="5" placeholder="Tell us briefly about your pain or question" maxlength="1000" required aria-describedby="ctMessageErr"></textarea>
                                <div class="ct-form__meta">
                                    <div class="hero-field__error" id="ctMessageErr" data-error-for="message"></div>
                                    <span class="ct-count" aria-hidden="true"><span id="ctCount">0</span>/1000</span>
                                </div>
                            </div>

                            <!-- spam trap: hidden from people, bots fill it in -->
                            <div class="ct-hp" aria-hidden="true">
                                <label for="ctWebsite">Leave this empty</label>
                                <input id="ctWebsite" type="text" name="website" tabindex="-1" autocomplete="off">
                            </div>

                            <div class="col-12">
                                <label class="ct-consent">
                                    <input class="form-check-input" type="checkbox" name="consent" value="1" aria-describedby="ctConsentErr">
                                    <span>I agree to be contacted by <?= e($site['name']) ?> about my enquiry.</span>
                                </label>
                                <div class="hero-field__error" id="ctConsentErr" data-error-for="consent"></div>
                            </div>
                            <div class="col-12">
                                <button class="hero-form__submit ct-submit" id="contactSubmit" type="submit">
                                    <span class="ct-submit__text">Send Message</span>
                                    <span class="ct-submit__busy">Sending…</span>
                                    <?= icon('arrow') ?>
                                </button>
                                <div class="contact-alert" id="contactAlert" role="status" hidden></div>
                                <p class="hero-form__note ct-note"><?= icon('lock') ?> Your details are safe with us. We respect your medical privacy.</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- timings -->
            <div class="col-lg-5">
                <aside class="ct-hours" data-aos="fade-up" data-aos-delay="120" aria-labelledby="ctHoursTitle">
                    <div class="ct-hours__head">
                        <span class="ct-hours__icon" aria-hidden="true"><?= icon('clock') ?></span>
                        <h2 id="ctHoursTitle"><?= e($contactPage['hours']['title']) ?></h2>
                        <span class="ct-status" id="ctStatus" hidden></span>
                    </div>
                    <ul class="ct-hours__list" id="ctHours">
<?php foreach ($weekdays as $day): ?>
<?php $slots = $slotsByDay[$day] ?? []; ?>
                        <li data-day="<?= e($day) ?>" data-slots="<?= e(implode(',', array_map(function ($s) { return $s[0] . '-' . $s[1]; }, $slots))) ?>">
                            <span class="ct-hours__day"><?= e($day) ?></span>
                            <span class="ct-hours__time"><?= $slots ? str_replace(', ', '<br>', e(format_slots($slots))) : 'Closed' ?></span>
                        </li>
<?php endforeach; ?>
                    </ul>
                    <p class="ct-hours__note"><?= e($contactPage['hours']['note']) ?></p>
                    <div class="ct-hours__actions">
                        <a class="ct-btn ct-btn--call" href="tel:<?= e(tel($site['phones'][0])) ?>"><?= icon('phone') ?>Call Now</a>
                        <a class="ct-btn ct-btn--wa" href="<?= e(whatsapp_link($site['whatsapp'], $site['whatsapp_messages']['book'])) ?>" target="_blank" rel="noopener"><?= icon('whatsapp') ?>WhatsApp</a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!--/ form + timings -->

<!-- map -->
<section class="ct-map" aria-labelledby="ctMapTitle">
    <div class="container-90">
        <div class="ct-map__head" data-aos="fade-up">
            <div>
                <span class="svc-eyebrow"><?= e($contactPage['map']['eyebrow']) ?></span>
                <h2 class="svc-title" id="ctMapTitle"><?= e($contactPage['map']['title']) ?> <span><?= e($contactPage['map']['highlight']) ?></span></h2>
            </div>
            <a class="why-btn" href="<?= e($mapDirections) ?>" target="_blank" rel="noopener">
                Get Directions
                <span aria-hidden="true"><?= icon('arrow') ?></span>
            </a>
        </div>
        <div class="ct-map__frame" data-aos="fade-up">
            <iframe src="<?= e($mapEmbed) ?>" title="Map showing the location of <?= e($site['name']) ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
        </div>
    </div>
</section>
<!--/ map -->
