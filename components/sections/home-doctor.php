<?php
/**
 * Home: meet the doctor. Profile card (initials portrait, credentials,
 * quick facts) beside an intro and key points, with a link to doctors.php.
 * Copy from $homeDoctor; doctor details from $site and $doctorPage.
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $site */
/** @var array $homeDoctor */
/** @var array $doctorPage */

$doctor = $site['doctor'];
$profile = $doctorPage['profile'];
$rating = (int) $profile['google_rating'];

$facts = array_filter([
    $profile['experience_years'] ? [$profile['experience_years'] . '+', 'Years Experience'] : null,
    $rating ? [$rating . '.0', 'Google Rating'] : null,
    $profile['languages'] ? [count(explode(',', $profile['languages'])), 'Languages Spoken'] : null,
]);
?>
<!-- meet the doctor -->
<section class="home-doctor" id="meet-doctor" aria-labelledby="homeDoctorTitle">
    <div class="container-90">
        <div class="row align-items-center g-5">
            <!-- profile card -->
            <div class="col-lg-5">
                <div class="hd-card" data-aos="fade-right">
                    <div class="hd-card__portrait">
<?php if ($profile['photo']): ?>
                        <img src="<?= e($profile['photo']) ?>" alt="<?= e($doctor['name']) ?>" loading="lazy">
<?php else: ?>
                        <span class="hd-card__initials" aria-hidden="true"><?= e($doctor['initials']) ?></span>
<?php endif; ?>
<?php if ($rating): ?>
                        <span class="hd-card__rating" aria-label="<?= $rating ?> out of 5 stars on Google"><?= str_repeat(icon('star'), $rating) ?></span>
<?php endif; ?>
                    </div>

                    <div class="hd-card__body">
                        <p class="hd-card__name"><?= e($doctor['name']) ?></p>
                        <p class="hd-card__role"><?= e($profile['designation']) ?></p>
                        <span class="hd-card__reg"><?= icon('shield') ?> Regd. No. <?= e($doctor['reg_no']) ?></span>

<?php if ($facts): ?>
                        <ul class="hd-card__facts">
<?php foreach ($facts as [$factValue, $factLabel]): ?>
                            <li><strong><?= e($factValue) ?></strong><span><?= e($factLabel) ?></span></li>
<?php endforeach; ?>
                        </ul>
<?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- intro + key points -->
            <div class="col-lg-7">
                <div class="hd-content">
                    <span class="about-eyebrow" data-aos="fade-up"><?= e($homeDoctor['eyebrow']) ?></span>
                    <h2 class="about-title" id="homeDoctorTitle" data-aos="fade-up" data-aos-delay="80"><?= e($homeDoctor['title']) ?> <span><?= e($doctor['name']) ?></span></h2>
                    <p class="hd-lead" data-aos="fade-up" data-aos-delay="160"><?= e($homeDoctor['lead']) ?></p>

                    <ul class="hd-points">
<?php foreach ($homeDoctor['points'] as $i => $point): ?>
                        <li class="hd-point" data-aos="fade-up" data-aos-delay="<?= 200 + ($i % 2) * 100 ?>">
                            <span class="hd-point__icon" aria-hidden="true"><?= icon($point['icon']) ?></span>
                            <span>
                                <strong><?= e($point['title']) ?></strong>
                                <small><?= e($point['text']) ?></small>
                            </span>
                        </li>
<?php endforeach; ?>
                    </ul>

                    <div class="about-actions" data-aos="fade-up">
                        <a class="about-btn about-btn--primary" href="doctors.php">
                            <?= e($homeDoctor['cta']) ?>
                            <span aria-hidden="true"><?= icon('arrow') ?></span>
                        </a>
                        <a class="about-btn about-btn--ghost" href="<?= e(booking_url()) ?>">Book Free Consultation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ meet the doctor -->
