<?php
/**
 * About page: what sets us apart. Six differentiators from
 * $aboutPage['apart']['points'], staggered in on scroll.
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $aboutPage */

$apart = $aboutPage['apart'];
?>
<!-- what sets us apart -->
<section class="why-us" id="why-us" aria-labelledby="whyTitle">
    <div class="container-90">
        <div class="why-head">
            <div class="why-head__title" data-aos="fade-right">
                <span class="why-eyebrow"><?= e($apart['eyebrow']) ?></span>
                <h2 class="why-title" id="whyTitle"><?= e($apart['title']) ?> <span><?= e($apart['highlight']) ?></span></h2>
            </div>
            <div class="why-head__aside" data-aos="fade-left">
                <p class="why-lead"><?= e($apart['lead']) ?></p>
                <a class="why-btn" href="<?= e(booking_url()) ?>">
                    Book Free Consultation
                    <span aria-hidden="true"><?= icon('arrow') ?></span>
                </a>
            </div>
        </div>

        <div class="why-grid">
<?php foreach ($apart['points'] as $i => $point): ?>
            <article class="why-card" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 120 ?>">
                <span class="why-card__num" aria-hidden="true"><?= sprintf('%02d', $i + 1) ?></span>
                <span class="why-card__icon" aria-hidden="true"><?= icon($point['icon']) ?></span>
                <h3 class="why-card__title"><?= e($point['title']) ?></h3>
                <p class="why-card__text"><?= e($point['text']) ?></p>
            </article>
<?php endforeach; ?>
        </div>
    </div>
</section>
<!--/ what sets us apart -->
