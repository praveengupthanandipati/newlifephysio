<?php
/**
 * About page: meet our founder. Clinical philosophy beside three focus
 * cards (expertise, areas of practice, patient-centred care), then the
 * mission as a quote. Content from $aboutPage['founder'].
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $site */
/** @var array $aboutPage */

$founder = $aboutPage['founder'];
$doctor = $site['doctor'];
$designation = $GLOBALS['doctorPage']['profile']['designation'];
?>
<!-- meet our founder -->
<section class="founder" id="founder" aria-labelledby="founderTitle">
    <div class="container-90">
        <div class="row g-5">
            <!-- philosophy -->
            <div class="col-lg-5">
                <div class="founder-intro">
                    <span class="who-eyebrow" data-aos="fade-up"><?= e($founder['eyebrow']) ?></span>
                    <h2 class="who-title" id="founderTitle" data-aos="fade-up" data-aos-delay="80"><?= e($founder['title']) ?> <span><?= e($founder['highlight']) ?></span></h2>
                    <p class="founder-intro__text" data-aos="fade-up" data-aos-delay="160"><?= e($founder['philosophy']) ?></p>

                    <div class="founder-id" data-aos="fade-up" data-aos-delay="240">
                        <span class="who-doctor__avatar" aria-hidden="true"><?= e($doctor['initials']) ?></span>
                        <span>
                            <strong><?= e($doctor['name']) ?></strong>
                            <small><?= e($designation) ?> &middot; Regd. No. <?= e($doctor['reg_no']) ?></small>
                        </span>
                    </div>
                </div>
            </div>

            <!-- focus cards -->
            <div class="col-lg-7">
                <div class="founder-points">
<?php foreach ($founder['points'] as $i => $point): ?>
                    <article class="founder-point" data-aos="fade-left" data-aos-delay="<?= $i * 120 ?>">
                        <span class="founder-point__icon" aria-hidden="true"><?= icon($point['icon']) ?></span>
                        <div>
                            <h3 class="founder-point__title"><?= e($point['title']) ?></h3>
                            <p class="founder-point__text"><?= e($point['text']) ?></p>
                        </div>
                    </article>
<?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- mission -->
        <figure class="founder-mission" data-aos="fade-up">
            <span class="founder-mission__icon" aria-hidden="true"><?= icon('quote') ?></span>
            <blockquote>
                <p><?= e($founder['mission']) ?></p>
            </blockquote>
            <figcaption><?= e($doctor['name']) ?> &middot; <?= e($designation) ?></figcaption>
        </figure>
    </div>
</section>
<!--/ meet our founder -->
