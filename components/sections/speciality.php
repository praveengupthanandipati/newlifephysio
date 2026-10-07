<?php
/**
 * Speciality page body (Manual Therapy, Laser Therapy, ...), all content
 * from $specialityPages[$activePage] in data.php.
 * Reuses the About page intro / card styles (who-*, why-*), the Why Choose Us
 * numbered list (promise-*) and the FAQ accordion (faq-*); the conditions +
 * benefits block and section wrappers are in _speciality-page.scss.
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $site */
/** @var array $specialityPages */
/** @var string $activePage */
/** @var array $treatments */

$sp = $specialityPages[$activePage];
$doctor = $site['doctor'];
$treatmentsBySlug = array_column($treatments, null, 'slug');
?>
<!-- overview -->
<section class="who-we-are" id="overview" aria-labelledby="spIntroTitle">
    <div class="container-90">
        <div class="row align-items-center g-5">
            <!-- media -->
            <div class="col-lg-6">
                <div class="who-media">
                    <figure class="who-media__img" data-aos="reveal">
                        <img src="img/<?= e($sp['intro']['image']) ?>-1024.jpg" srcset="img/<?= e($sp['intro']['image']) ?>-1024.jpg 1024w, img/<?= e($sp['intro']['image']) ?>.jpg 1920w" sizes="(min-width: 992px) 45vw, 90vw" alt="<?= e($sp['intro']['image_alt']) ?>" loading="lazy">
                    </figure>

                    <div class="who-doctor" data-aos="fade-up" data-aos-delay="300">
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
                    <span class="who-eyebrow" data-aos="fade-up"><?= e($sp['intro']['eyebrow']) ?></span>
                    <h2 class="who-title" id="spIntroTitle" data-aos="fade-up" data-aos-delay="80"><?= e($sp['intro']['title']) ?> <span><?= e($sp['intro']['highlight']) ?></span></h2>
<?php foreach ($sp['intro']['paragraphs'] as $i => $paragraph): ?>
                    <p class="who-text" data-aos="fade-up" data-aos-delay="<?= 160 + $i * 80 ?>"><?= e($paragraph) ?></p>
<?php endforeach; ?>
                    <ul class="sp-checks" data-aos="fade-up" data-aos-delay="320">
<?php foreach ($sp['intro']['points'] as $point): ?>
                        <li><?= icon('shield') ?><?= e($point) ?></li>
<?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ overview -->

<!-- techniques -->
<section class="why-us" id="techniques" aria-labelledby="spTechTitle">
    <div class="container-90">
        <div class="why-head">
            <div class="why-head__title" data-aos="fade-right">
                <span class="why-eyebrow"><?= e($sp['techniques']['eyebrow']) ?></span>
                <h2 class="why-title" id="spTechTitle"><?= e($sp['techniques']['title']) ?> <span><?= e($sp['techniques']['highlight']) ?></span></h2>
            </div>
            <div class="why-head__aside" data-aos="fade-left">
                <p class="why-lead"><?= e($sp['techniques']['lead']) ?></p>
                <a class="why-btn" href="<?= e(booking_url()) ?>">
                    Book Free Consultation
                    <span aria-hidden="true"><?= icon('arrow') ?></span>
                </a>
            </div>
        </div>

        <div class="why-grid<?= count($sp['techniques']['items']) % 4 === 0 ? ' sp-tech-grid' : '' ?>">
<?php foreach ($sp['techniques']['items'] as $i => $item): ?>
            <article class="why-card" data-aos="fade-up" data-aos-delay="<?= ($i % 4) * 100 ?>">
                <span class="why-card__num" aria-hidden="true"><?= sprintf('%02d', $i + 1) ?></span>
                <span class="why-card__icon" aria-hidden="true"><?= icon($item['icon']) ?></span>
                <h3 class="why-card__title"><?= e($item['title']) ?></h3>
                <p class="why-card__text"><?= e($item['text']) ?></p>
            </article>
<?php endforeach; ?>
        </div>
    </div>
</section>
<!--/ techniques -->

<!-- conditions + benefits -->
<section class="sp-helps" id="conditions" aria-labelledby="spHelpsTitle">
    <div class="container-90">
        <div class="svc-head" data-aos="fade-up">
            <span class="svc-eyebrow"><?= e($sp['helps']['eyebrow']) ?></span>
            <h2 class="svc-title" id="spHelpsTitle"><?= e($sp['helps']['title']) ?> <span><?= e($sp['helps']['highlight']) ?></span></h2>
            <p class="svc-lead"><?= e($sp['helps']['lead']) ?></p>
        </div>

        <div class="row g-4 g-xl-5">
            <div class="col-lg-7" data-aos="fade-up">
                <ul class="sp-chips">
<?php foreach ($sp['helps']['conditions'] as $slug): ?>
<?php if (!isset($treatmentsBySlug[$slug])) continue; ?>
<?php $t = $treatmentsBySlug[$slug]; ?>
                    <li><a class="sp-chip" href="treatments.php#<?= e($slug) ?>"><?= icon($t['icon']) ?><?= e($t['name']) ?></a></li>
<?php endforeach; ?>
<?php foreach ($sp['helps']['extra'] as $label): ?>
                    <li><span class="sp-chip sp-chip--plain"><?= icon('heart') ?><?= e($label) ?></span></li>
<?php endforeach; ?>
                </ul>
            </div>

            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="120">
                <div class="sp-benefits">
                    <h3><?= e($sp['helps']['benefits_title']) ?></h3>
                    <ul>
<?php foreach ($sp['helps']['benefits'] as $benefit): ?>
                        <li><?= icon('shield') ?><?= e($benefit) ?></li>
<?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ conditions + benefits -->

<!-- what to expect -->
<section class="care-promise" id="what-to-expect" aria-labelledby="spProcessTitle">
    <div class="container-90">
        <div class="row align-items-center g-5">
            <!-- media -->
            <div class="col-lg-5">
                <div class="promise-media">
                    <figure class="promise-media__img" data-aos="reveal">
                        <img src="img/<?= e($sp['process']['image']) ?>-1024.jpg" srcset="img/<?= e($sp['process']['image']) ?>-1024.jpg 1024w, img/<?= e($sp['process']['image']) ?>.jpg 1920w" sizes="(min-width: 992px) 38vw, 90vw" alt="<?= e($sp['process']['image_alt']) ?>" loading="lazy">
                    </figure>
                    <div class="promise-badge" data-aos="fade-up" data-aos-delay="300">
                        <span class="promise-badge__icon" aria-hidden="true"><?= icon('heart') ?></span>
                        <span>
                            <strong><?= e($sp['process']['badge']['title']) ?></strong>
                            <small><?= e($sp['process']['badge']['text']) ?></small>
                        </span>
                    </div>
                </div>
            </div>

            <!-- steps -->
            <div class="col-lg-7">
                <span class="promise-eyebrow" data-aos="fade-up"><?= e($sp['process']['eyebrow']) ?></span>
                <h2 class="promise-title" id="spProcessTitle" data-aos="fade-up" data-aos-delay="80"><?= e($sp['process']['title']) ?> <span><?= e($sp['process']['highlight']) ?></span></h2>
                <p class="promise-lead" data-aos="fade-up" data-aos-delay="160"><?= e($sp['process']['lead']) ?></p>

                <ol class="promise-list">
<?php foreach ($sp['process']['items'] as $i => $item): ?>
                    <li class="promise-item" data-aos="fade-up" data-aos-delay="<?= 200 + $i * 80 ?>">
                        <span class="promise-item__num" aria-hidden="true"><?= sprintf('%02d', $i + 1) ?></span>
                        <div>
                            <h3><?= e($item['title']) ?></h3>
                            <p><?= e($item['text']) ?></p>
                        </div>
                    </li>
<?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>
</section>
<!--/ what to expect -->

<!-- faq -->
<section class="sp-faq" id="faq" aria-labelledby="spFaqTitle">
    <div class="container-90">
        <div class="svc-head" data-aos="fade-up">
            <span class="svc-eyebrow"><?= e($sp['faq']['eyebrow']) ?></span>
            <h2 class="svc-title" id="spFaqTitle"><?= e($sp['faq']['title']) ?> <span><?= e($sp['faq']['highlight']) ?></span></h2>
        </div>

        <div class="accordion faq-acc sp-faq__list" id="spFaqList">
<?php foreach ($sp['faq']['items'] as $i => $item): ?>
<?php $id = 'sp-faq-' . ($i + 1); $open = $i === 0; ?>
            <div class="accordion-item faq-item" data-aos="fade-up">
                <h3 class="accordion-header">
                    <button class="accordion-button<?= $open ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $id ?>" aria-expanded="<?= $open ? 'true' : 'false' ?>" aria-controls="<?= $id ?>">
                        <span class="faq-item__num" aria-hidden="true"><?= sprintf('%02d', $i + 1) ?></span>
                        <span class="faq-item__q"><?= e($item['q']) ?></span>
                    </button>
                </h3>
                <div id="<?= $id ?>" class="accordion-collapse collapse<?= $open ? ' show' : '' ?>" data-bs-parent="#spFaqList">
                    <div class="accordion-body">
                        <p><?= e($item['a']) ?></p>
                    </div>
                </div>
            </div>
<?php endforeach; ?>
        </div>

        <p class="sp-faq__more" data-aos="fade-up">More questions? <a href="faq.php">See all FAQs <?= icon('arrow') ?></a></p>
    </div>
</section>
<!--/ faq -->
