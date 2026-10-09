<?php
/**
 * Doctor page: profile card + bio and credentials.
 * Optional credentials in $doctorPage['profile'] (photo, qualifications,
 * experience_years, languages) are only shown once filled in.
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $site */
/** @var array $doctorPage */
/** @var array $treatments */
/** @var array $specialities */

$doctor = $site['doctor'];
$profile = $doctorPage['profile'];
$mainPhone = $site['phones'][0];

// Credential rows: label => value; empty values are skipped
$credentials = array_filter([
    'Designation'     => $doctor['role'] . ' (PT)',
    'Registration No.' => $doctor['reg_no'],
    'Qualifications'  => $profile['qualifications'],
    'Experience'      => $profile['experience_years'] ? $profile['experience_years'] . '+ years' : '',
    'Languages'       => $profile['languages'],
    'Clinic Hours'    => implode(' · ', array_map(function ($group) {
        return $group['label'] . ' ' . format_slots($group['slots']);
    }, $site['hours'])),
]);

$stats = array_filter([
    $profile['experience_years'] ? [$profile['experience_years'], '+', 'Years Experience'] : null,
    [count($treatments), '+', 'Conditions Treated'],
    [count($specialities), '', 'Specialised Therapies'],
]);
?>
<!-- doctor profile -->
<section class="doc-profile" id="profile" aria-labelledby="docName">
    <div class="container-90">
        <div class="row g-5 align-items-center">
            <!-- profile card -->
            <div class="col-lg-5">
                <div class="doc-card" data-aos="zoom-in">
                    <div class="doc-card__portrait">
<?php if ($profile['photo']): ?>
                        <img src="<?= e($profile['photo']) ?>" alt="<?= e($doctor['name']) ?>, <?= e($doctor['role']) ?>">
<?php else: ?>
                        <span class="doc-card__initials" aria-hidden="true"><?= e($doctor['initials']) ?></span>
<?php endif; ?>
                        <span class="doc-card__badge"><?= icon('shield') ?> Regd. No. <?= e($doctor['reg_no']) ?></span>
                    </div>
                    <div class="doc-card__body">
                        <p class="doc-card__name"><?= e($doctor['name']) ?></p>
                        <p class="doc-card__role"><?= e($doctor['role']) ?><?= $profile['qualifications'] ? ' &middot; ' . e($profile['qualifications']) : '' ?></p>

                        <ul class="doc-card__stats">
<?php foreach ($stats as [$value, $suffix, $label]): ?>
                            <li><strong><span data-count-to="<?= (int) $value ?>">0</span><?= e($suffix) ?></strong><span class="doc-card__stat-label"><?= e($label) ?></span></li>
<?php endforeach; ?>
                        </ul>

                        <div class="doc-card__actions">
                            <a class="doc-card__btn doc-card__btn--call" href="tel:<?= e(tel($mainPhone)) ?>"><?= icon('phone') ?>Call</a>
                            <a class="doc-card__btn doc-card__btn--wa" href="<?= e(whatsapp_link($site['whatsapp'], $site['whatsapp_messages']['book'])) ?>" target="_blank" rel="noopener"><?= icon('whatsapp') ?>WhatsApp</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- bio + credentials -->
            <div class="col-lg-7">
                <div class="doc-info">
                    <span class="doc-eyebrow" data-aos="fade-up">Doctor Profile</span>
                    <h2 class="doc-title" id="docName" data-aos="fade-up" data-aos-delay="80">Your Physiotherapist, <span><?= e($doctor['name']) ?></span></h2>
<?php foreach ($profile['bio'] as $i => $paragraph): ?>
                    <p class="doc-text" data-aos="fade-up" data-aos-delay="<?= 160 + $i * 80 ?>"><?= e($paragraph) ?></p>
<?php endforeach; ?>

                    <dl class="doc-creds" data-aos="fade-up" data-aos-delay="320">
<?php foreach ($credentials as $label => $value): ?>
                        <div class="doc-creds__row">
                            <dt><?= e($label) ?></dt>
                            <dd><?= e($value) ?></dd>
                        </div>
<?php endforeach; ?>
                    </dl>

                    <div class="doc-chips" data-aos="fade-up" data-aos-delay="400">
                        <span class="doc-chips__label">Specialities</span>
                        <ul>
<?php foreach ($specialities as $speciality): ?>
                            <li><a href="<?= e($speciality['slug']) ?>.php"><?= e($speciality['name']) ?></a></li>
<?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ doctor profile -->
