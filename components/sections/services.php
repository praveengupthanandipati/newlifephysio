<?php
/**
 * Home: conditions we treat. Filter tabs + cards from $treatments, counts
 * computed per category; filtering is in js/custom.js.
 */
$counts = ['all' => count($treatments) + 1]; // +1: featured child therapy card
foreach ($treatmentCategories as $catId => $catLabel) {
    $counts[$catId] = count(array_filter($treatments, function ($t) use ($catId) {
        return $t['cat'] === $catId;
    })) + ($catId === 'child' ? 1 : 0);
}
?>
<!-- services -->
<section class="services-home" id="services" aria-labelledby="servicesTitle">
    <div class="container-90">
        <div class="svc-head" data-aos="fade-up">
            <span class="svc-eyebrow">Conditions We Treat</span>
            <h2 class="svc-title" id="servicesTitle">Specialised Care for <span>Every Stage of Recovery</span></h2>
            <p class="svc-lead">From everyday aches to complex neurological conditions, <?= e($site['doctor']['name']) ?> builds a treatment plan around you &mdash; for adults and children alike.</p>
        </div>

        <div class="svc-tabs" role="group" aria-label="Filter conditions" data-aos="fade-up" data-aos-delay="100">
            <button class="svc-tab is-active" type="button" data-filter="all" aria-pressed="true">All <span><?= $counts['all'] ?></span></button>
<?php foreach ($treatmentCategories as $catId => $catLabel): ?>
            <button class="svc-tab" type="button" data-filter="<?= e($catId) ?>" aria-pressed="false"><?= e($catLabel) ?> <span><?= $counts[$catId] ?></span></button>
<?php endforeach; ?>
        </div>

        <div class="svc-grid">
<?php foreach ($treatments as $i => $t): ?>
            <article class="svc-card" data-cat="<?= e($t['cat']) ?>" data-aos="fade-up" data-aos-delay="<?= ($i % 4) * 60 ?>">
                <a class="svc-card__link" href="treatments.php#<?= e($t['slug']) ?>">
                    <span class="svc-card__num" aria-hidden="true"><?= sprintf('%02d', $i + 1) ?></span>
                    <span class="svc-card__icon" aria-hidden="true"><?= icon($t['icon']) ?></span>
                    <span class="svc-card__cat"><?= e($treatmentCategories[$t['cat']]) ?></span>
                    <h3 class="svc-card__title"><?= e($t['name']) ?></h3>
                    <p class="svc-card__text"><?= e($t['text']) ?></p>
                    <span class="svc-card__more">Learn more <?= icon('arrow') ?></span>
                </a>
            </article>
<?php endforeach; ?>
            <article class="svc-card svc-card--feature" data-cat="child" data-aos="fade-up">
                <div class="svc-feature">
                    <span class="svc-feature__icon" aria-hidden="true"><?= icon('child') ?></span>
                    <div class="svc-feature__body">
                        <span class="svc-feature__tag"><?= e($childTherapy['tag']) ?></span>
                        <h3 class="svc-feature__title"><?= e($childTherapy['title']) ?></h3>
                        <p class="svc-feature__text"><?= e($childTherapy['text']) ?></p>
                    </div>
                    <a class="svc-feature__btn" href="<?= e(anchor('appointment')) ?>"><?= e($childTherapy['cta']) ?> <?= icon('arrow') ?></a>
                </div>
            </article>
        </div>

        <div class="svc-cta" data-aos="fade-up">
            <div class="svc-cta__text">
                <h3>Don't see your condition listed?</h3>
                <p>Talk to <?= e($site['doctor']['name']) ?> &mdash; we'll tell you honestly whether physiotherapy can help.</p>
            </div>
            <div class="svc-cta__actions">
                <a class="svc-cta__btn svc-cta__btn--call" href="tel:<?= e(tel($site['phones'][0])) ?>"><?= icon('phone') ?><?= e($site['phones'][0]) ?></a>
                <a class="svc-cta__btn svc-cta__btn--wa" href="<?= e(whatsapp_link($site['whatsapp'], $site['whatsapp_messages']['query'])) ?>" target="_blank" rel="noopener"><?= icon('whatsapp') ?>WhatsApp Us</a>
            </div>
        </div>
    </div>
</section>
<!--/ services-->
