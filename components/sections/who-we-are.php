<?php
/**
 * About page: who we are. Story, mission / vision and a stats band whose
 * numbers are derived from data.php and count up when scrolled into view
 * (js/custom.js, [data-count-to]).
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $site */
/** @var array $aboutPage */
/** @var array $treatments */
/** @var array $specialities */

$who = $aboutPage['who'];
$doctor = $site['doctor'];
$city = $site['address']['city'];

$daysOpen = count(array_unique(array_merge(...array_column($site['hours'], 'days'))));
$stats = [
    ['value' => count($treatments), 'suffix' => '+', 'label' => 'Conditions Treated'],
    ['value' => count($specialities), 'suffix' => '', 'label' => 'Specialised Therapies'],
    ['value' => $daysOpen, 'suffix' => '', 'label' => 'Days Open Every Week'],
    ['value' => 2, 'suffix' => '', 'label' => 'Age Groups: Adults & Children'],
];
?>
<!-- who we are -->
<section class="who-we-are" id="who-we-are" aria-labelledby="whoTitle">
    <div class="container-90">
        <div class="row align-items-center g-5">
            <!-- media -->
            <div class="col-lg-6">
                <div class="who-media">
                    <figure class="who-media__img" data-aos="reveal">
                        <img src="img/<?= e($who['image']) ?>-1024.jpg" srcset="img/<?= e($who['image']) ?>-1024.jpg 1024w, img/<?= e($who['image']) ?>.jpg 1920w" sizes="(min-width: 992px) 45vw, 90vw" alt="Physiotherapist guiding a patient through an assisted leg stretch" loading="lazy">
                    </figure>

                    <div class="who-doctor" id="doctor" data-aos="fade-up" data-aos-delay="300">
                        <span class="who-doctor__avatar" aria-hidden="true"><?= e($doctor['initials']) ?></span>
                        <span>
                            <strong><?= e($doctor['name']) ?></strong>
                            <small><?= e($doctor['role']) ?> &middot; Regd. No. <?= e($doctor['reg_no']) ?></small>
                            <a class="who-doctor__link" href="doctors.php">View profile <?= icon('arrow') ?></a>
                        </span>
                    </div>
                </div>
            </div>

            <!-- content -->
            <div class="col-lg-6">
                <div class="who-content">
                    <span class="who-eyebrow" data-aos="fade-up"><?= e($who['eyebrow']) ?></span>
                    <h2 class="who-title" id="whoTitle" data-aos="fade-up" data-aos-delay="80"><?= e($who['title']) ?> <span><?= e($who['highlight']) ?></span></h2>
<?php foreach ($who['paragraphs'] as $i => $paragraph): ?>
                    <p class="who-text" data-aos="fade-up" data-aos-delay="<?= 160 + $i * 80 ?>"><?= e($paragraph) ?></p>
<?php endforeach; ?>

                    <div class="who-mv">
<?php foreach ([['target', 'Our Mission', $who['mission']], ['eye', 'Our Vision', $who['vision']]] as $i => [$mvIcon, $mvTitle, $mvText]): ?>
                        <div class="who-mv__card" data-aos="zoom-in" data-aos-delay="<?= 320 + $i * 120 ?>">
                            <span class="who-mv__icon" aria-hidden="true"><?= icon($mvIcon) ?></span>
                            <h3><?= e($mvTitle) ?></h3>
                            <p><?= e(str_replace('{city}', $city, $mvText)) ?></p>
                        </div>
<?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- stats band -->
        <ul class="who-stats" data-aos="fade-up">
<?php foreach ($stats as $i => $stat): ?>
            <li class="who-stats__item">
                <span class="who-stats__num"><span data-count-to="<?= (int) $stat['value'] ?>">0</span><?= e($stat['suffix']) ?></span>
                <span class="who-stats__label"><?= e($stat['label']) ?></span>
            </li>
<?php endforeach; ?>
        </ul>
    </div>
</section>
<!--/ who we are -->
