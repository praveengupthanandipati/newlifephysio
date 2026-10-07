<?php
/**
 * Free appointment page: booking form + "what's included" panel, and the
 * booking FAQs. js/custom.js validates the form (and greys out times the
 * clinic is closed on the chosen day) and posts it to appointment.php.
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $site */
/** @var array $appointmentPage */
/** @var array $treatments */
/** @var array $treatmentCategories */
/** @var array $bookingExtraOptions */

$ap = $appointmentPage;
$tz = new DateTimeZone('Asia/Kolkata');
$minDate = (new DateTime('today', $tz))->format('Y-m-d');
$maxDate = (new DateTime('today', $tz))->modify('+60 days')->format('Y-m-d');

// Each distinct opening slot, with the weekdays it runs on
$timeSlots = [];
foreach ($site['hours'] as $group) {
    foreach ($group['slots'] as $s) {
        $key = $s[0] . '-' . $s[1];
        $timeSlots[$key]['label'] = (int) $s[0] < 12 ? 'Morning' : 'Evening';
        $timeSlots[$key]['time'] = format_slots([$s]);
        $timeSlots[$key]['days'] = array_merge($timeSlots[$key]['days'] ?? [], $group['days']);
    }
}
$openDays = array_merge(...array_column($site['hours'], 'days'));
?>
<!-- booking -->
<section class="ap-booking" aria-labelledby="apFormTitle">
    <div class="container-90">
        <div class="row g-4 g-xl-5">
            <!-- form -->
            <div class="col-lg-7">
                <div class="ct-form-box" id="appointment" data-aos="fade-up">
                    <span class="svc-eyebrow"><?= e($ap['form']['eyebrow']) ?></span>
                    <h2 class="svc-title" id="apFormTitle"><?= e($ap['form']['title']) ?> <span><?= e($ap['form']['highlight']) ?></span></h2>
                    <p class="svc-lead"><?= e($ap['form']['lead']) ?></p>

                    <form class="ct-form" id="bookForm" action="appointment.php" method="post" novalidate data-open-days="<?= e(implode(',', $openDays)) ?>">
                        <input type="hidden" name="source" value="page">
                        <div class="row g-3">
                            <div class="col-12">
                                <span class="ct-label" id="apPatientLabel">Appointment for <span aria-hidden="true">*</span></span>
                                <div class="ap-choice" role="radiogroup" aria-labelledby="apPatientLabel">
                                    <label class="ap-choice__item">
                                        <input type="radio" name="patient" value="adult" checked>
                                        <span><?= icon('heart') ?>Adult</span>
                                    </label>
                                    <label class="ap-choice__item">
                                        <input type="radio" name="patient" value="child">
                                        <span><?= icon('child') ?>Child</span>
                                    </label>
                                </div>
                                <div class="hero-field__error" data-error-for="patient"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="ct-label" for="apName">Patient name <span aria-hidden="true">*</span></label>
                                <input class="form-control ct-input" id="apName" type="text" name="name" placeholder="Full name of the patient" autocomplete="name" maxlength="80" required>
                                <div class="hero-field__error" data-error-for="name"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="ct-label" for="apPhone">Mobile number <span aria-hidden="true">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text ct-prefix">+91</span>
                                    <input class="form-control ct-input" id="apPhone" type="tel" name="phone" placeholder="10 digit mobile number" autocomplete="tel-national" inputmode="numeric" maxlength="15" required>
                                </div>
                                <div class="hero-field__error" data-error-for="phone"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="ct-label" for="apTreatment">Condition / treatment <span aria-hidden="true">*</span></label>
                                <select class="form-select ct-input" id="apTreatment" name="treatment" required>
                                    <option value="">Select a condition</option>
<?php foreach ($treatmentCategories as $catId => $catLabel): ?>
<?php $catItems = array_filter($treatments, function ($t) use ($catId) { return $t['cat'] === $catId; }); ?>
<?php if (!$catItems) continue; ?>
                                    <optgroup label="<?= e($catLabel) ?>">
<?php foreach ($catItems as $t): ?>
                                        <option><?= e($t['name']) ?></option>
<?php endforeach; ?>
                                    </optgroup>
<?php endforeach; ?>
                                    <optgroup label="Other">
<?php foreach ($bookingExtraOptions as $option): ?>
                                        <option><?= e($option) ?></option>
<?php endforeach; ?>
                                    </optgroup>
                                </select>
                                <div class="hero-field__error" data-error-for="treatment"></div>
                            </div>
                            <div class="col-md-6">
                                <label class="ct-label" for="apCity">City <span aria-hidden="true">*</span></label>
                                <select class="form-select ct-input" id="apCity" name="city" required>
                                    <option value="">Select your city</option>
<?php foreach ($site['cities'] as $city): ?>
                                    <option><?= e($city) ?></option>
<?php endforeach; ?>
                                </select>
                                <div class="hero-field__error" data-error-for="city"></div>
                            </div>

                            <div class="col-md-6">
                                <label class="ct-label" for="apDate">Preferred date <span aria-hidden="true">*</span></label>
                                <input class="form-control ct-input" id="apDate" type="date" name="date" min="<?= $minDate ?>" max="<?= $maxDate ?>" required>
                                <div class="hero-field__error" data-error-for="date"></div>
                            </div>
                            <div class="col-md-6">
                                <span class="ct-label" id="apSlotLabel">Preferred time <span aria-hidden="true">*</span></span>
                                <div class="ap-choice ap-choice--time" role="radiogroup" aria-labelledby="apSlotLabel">
<?php foreach ($timeSlots as $value => $ts): ?>
                                    <label class="ap-choice__item" data-days="<?= e(implode(',', $ts['days'])) ?>">
                                        <input type="radio" name="slot" value="<?= e($value) ?>">
                                        <span><strong><?= e($ts['label']) ?></strong><small><?= e($ts['time']) ?></small></span>
                                    </label>
<?php endforeach; ?>
                                </div>
                                <div class="hero-field__error" data-error-for="slot"></div>
                            </div>

                            <div class="col-12">
                                <label class="ct-label" for="apEmail">Email <small>(optional)</small></label>
                                <input class="form-control ct-input" id="apEmail" type="email" name="email" placeholder="you@example.com" autocomplete="email" maxlength="120">
                                <div class="hero-field__error" data-error-for="email"></div>
                            </div>
                            <div class="col-12">
                                <label class="ct-label" for="apNotes">Tell us about your problem <small>(optional)</small></label>
                                <textarea class="form-control ct-input" id="apNotes" name="notes" rows="3" placeholder="e.g. lower back pain for 3 months, worse when sitting" maxlength="500"></textarea>
                            </div>

                            <!-- spam trap: hidden from people, bots fill it in -->
                            <div class="ct-hp" aria-hidden="true">
                                <label for="apWebsite">Leave this empty</label>
                                <input id="apWebsite" type="text" name="website" tabindex="-1" autocomplete="off">
                            </div>

                            <div class="col-12">
                                <label class="ct-consent">
                                    <input class="form-check-input" type="checkbox" name="consent" value="1">
                                    <span>I agree to be contacted by <?= e($site['name']) ?> to confirm my appointment.</span>
                                </label>
                                <div class="hero-field__error" data-error-for="consent"></div>
                            </div>
                            <div class="col-12">
                                <button class="hero-form__submit ct-submit" id="bookSubmit" type="submit">
                                    <span class="ct-submit__text">Book Free Consultation</span>
                                    <span class="ct-submit__busy">Sending…</span>
                                    <?= icon('arrow') ?>
                                </button>
                                <div class="contact-alert" id="bookAlert" role="status" hidden></div>
                                <p class="hero-form__note ct-note"><?= icon('lock') ?> Your details are safe with us. We respect your medical privacy.</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- what's included -->
            <div class="col-lg-5">
                <aside class="ap-side" data-aos="fade-up" data-aos-delay="120">
                    <div class="ap-included">
                        <h2><?= e($ap['included']['title']) ?></h2>
                        <ul>
<?php foreach ($ap['included']['items'] as $item): ?>
                            <li><?= icon('shield') ?><?= e($item) ?></li>
<?php endforeach; ?>
                        </ul>
                    </div>

                    <ul class="ap-trust">
<?php foreach ($ap['trust'] as $point): ?>
                        <li>
                            <span class="ap-trust__icon" aria-hidden="true"><?= icon($point['icon']) ?></span>
                            <span><strong><?= e($point['title']) ?></strong><small><?= e($point['text']) ?></small></span>
                        </li>
<?php endforeach; ?>
                    </ul>

                    <div class="ap-quick">
                        <p>Prefer to talk? Book instantly by phone or WhatsApp.</p>
                        <div class="ct-hours__actions">
                            <a class="ct-btn ct-btn--call" href="tel:<?= e(tel($site['phones'][0])) ?>"><?= icon('phone') ?>Call Now</a>
                            <a class="ct-btn ct-btn--wa" href="<?= e(whatsapp_link($site['whatsapp'], $site['whatsapp_messages']['book'])) ?>" target="_blank" rel="noopener"><?= icon('whatsapp') ?>WhatsApp</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!--/ booking -->
