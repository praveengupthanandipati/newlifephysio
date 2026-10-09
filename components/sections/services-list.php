<?php
/**
 * Services page: quick-jump chips, then one block per service from $services
 * (anchor #<slug>, linked from the Services menu): overview, what we offer,
 * conditions (links to the Treatments page) and a related speciality page.
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $services */
/** @var array $servicesPage */
/** @var array $treatments */
/** @var array $specialities */

$treatmentsBySlug = array_column($treatments, null, 'slug');
$specialitiesBySlug = array_column($specialities, null, 'slug');
?>
<!-- services -->
<section class="srv-page" aria-labelledby="srvTitle">
    <div class="container-90">
        <div class="svc-head" data-aos="fade-up">
            <span class="svc-eyebrow"><?= e($servicesPage['eyebrow']) ?></span>
            <h2 class="svc-title" id="srvTitle"><?= e($servicesPage['title']) ?> <span><?= e($servicesPage['highlight']) ?></span></h2>
            <p class="svc-lead"><?= e($servicesPage['lead']) ?></p>
        </div>

        <nav class="srv-jump" aria-label="Jump to a service" data-aos="fade-up" data-aos-delay="80">
            <ul class="sp-chips">
<?php foreach ($services as $s): ?>
                <li><a class="sp-chip" href="#<?= e($s['slug']) ?>"><?= icon($s['icon']) ?><?= e($s['name']) ?></a></li>
<?php endforeach; ?>
            </ul>
        </nav>

        <div class="srv-list">
<?php foreach ($services as $i => $s): ?>
<?php $related = $s['related'] !== '' ? ($specialitiesBySlug[$s['related']] ?? null) : null; ?>
            <article class="srv-item" id="<?= e($s['slug']) ?>" aria-labelledby="srv-<?= e($s['slug']) ?>-title" data-aos="fade-up">
                <div class="srv-item__main">
                    <div class="srv-item__head">
                        <span class="srv-item__icon" aria-hidden="true"><?= icon($s['icon']) ?></span>
                        <span class="srv-item__num" aria-hidden="true"><?= sprintf('%02d', $i + 1) ?></span>
                    </div>
                    <h2 class="srv-item__title" id="srv-<?= e($s['slug']) ?>-title"><?= e($s['name']) ?></h2>
                    <p class="srv-item__text"><?= e($s['text']) ?></p>
                    <div class="srv-item__actions">
                        <a class="why-btn" href="<?= e(booking_url()) ?>">
                            Book Free Consultation
                            <span aria-hidden="true"><?= icon('arrow') ?></span>
                        </a>
<?php if ($related): ?>
                        <a class="srv-item__related" href="<?= e($related['slug']) ?>.php">About <?= e($related['name']) ?> <?= icon('arrow') ?></a>
<?php endif; ?>
                    </div>
                </div>

                <div class="srv-item__side">
                    <h3>What We Offer</h3>
                    <ul class="srv-offer">
<?php foreach ($s['offer'] as $point): ?>
                        <li><?= icon('shield') ?><?= e($point) ?></li>
<?php endforeach; ?>
                    </ul>

                    <h3>Conditions We Treat</h3>
                    <ul class="sp-chips srv-conditions">
<?php foreach ($s['conditions'] as $slug): ?>
<?php if (!isset($treatmentsBySlug[$slug])) continue; ?>
<?php $t = $treatmentsBySlug[$slug]; ?>
                        <li><a class="sp-chip" href="treatments.php#<?= e($slug) ?>"><?= icon($t['icon']) ?><?= e($t['name']) ?></a></li>
<?php endforeach; ?>
                    </ul>
                </div>
            </article>
<?php endforeach; ?>
        </div>
    </div>
</section>
<!--/ services -->
