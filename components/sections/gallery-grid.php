<?php
/**
 * Gallery page: category filters, photo grid and a full-screen zoom viewer.
 * Photos from $galleryPage. The viewer is a Swiper with the zoom module
 * (tap / double-tap / pinch to zoom, swipe or arrow keys to move), opened
 * and filtered in js/custom.js.
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $galleryPage */

$placeholder = 'img/gallery/placeholder.svg';
$photos = array_map(function ($item) use ($placeholder) {
    $item['full'] = $item['image'] ? 'img/' . $item['image'] . '.jpg' : $placeholder;
    $item['thumb'] = $item['image'] ? 'img/' . $item['image'] . '-1024.jpg' : $placeholder;
    return $item;
}, $galleryPage['items']);

$counts = ['all' => count($photos)];
foreach ($galleryPage['categories'] as $catId => $catLabel) {
    $counts[$catId] = count(array_filter($photos, function ($p) use ($catId) {
        return $p['cat'] === $catId;
    }));
}
?>
<!-- gallery -->
<section class="gallery-page" aria-labelledby="galleryTitle">
    <div class="container-90">
        <div class="svc-head" data-aos="fade-up">
            <span class="svc-eyebrow"><?= e($galleryPage['eyebrow']) ?></span>
            <h2 class="svc-title" id="galleryTitle"><?= e($galleryPage['title']) ?> <span><?= e($galleryPage['highlight']) ?></span></h2>
            <p class="svc-lead"><?= e($galleryPage['lead']) ?></p>
        </div>

        <div class="svc-tabs gl-tabs" role="group" aria-label="Filter photos" data-aos="fade-up" data-aos-delay="100">
            <button class="svc-tab is-active" type="button" data-filter="all" aria-pressed="true">All <span><?= $counts['all'] ?></span></button>
<?php foreach ($galleryPage['categories'] as $catId => $catLabel): ?>
<?php if (!$counts[$catId]) continue; ?>
            <button class="svc-tab" type="button" data-filter="<?= e($catId) ?>" aria-pressed="false"><?= e($catLabel) ?> <span><?= $counts[$catId] ?></span></button>
<?php endforeach; ?>
        </div>

        <ul class="gl-grid">
<?php foreach ($photos as $i => $photo): ?>
            <li class="gl-item<?= $photo['size'] ? ' gl-item--' . e($photo['size']) : '' ?>" data-cat="<?= e($photo['cat']) ?>" data-aos="zoom-in" data-aos-delay="<?= ($i % 4) * 80 ?>">
                <button class="gl-item__btn" type="button" data-index="<?= $i ?>" aria-label="View larger: <?= e($photo['title']) ?>">
                    <img src="<?= e($photo['thumb']) ?>" alt="<?= e($photo['alt']) ?>" loading="lazy">
                    <span class="gl-item__overlay">
                        <span class="gl-item__zoom" aria-hidden="true"><?= icon('zoom-in') ?></span>
                        <span class="gl-item__text">
                            <strong><?= e($photo['title']) ?></strong>
                            <small><?= e($galleryPage['categories'][$photo['cat']]) ?></small>
                        </span>
                    </span>
                </button>
            </li>
<?php endforeach; ?>
        </ul>
    </div>
</section>
<!--/ gallery -->

<!-- zoom viewer -->
<div class="gl-lightbox" id="glLightbox" role="dialog" aria-modal="true" aria-label="Photo viewer" hidden>
    <div class="gl-lightbox__bar">
        <span class="gl-lightbox__count" aria-live="polite"><span class="gl-current">1</span> / <?= count($photos) ?></span>
        <div class="gl-lightbox__tools">
            <button class="gl-lightbox__btn gl-zoom-toggle" type="button" aria-label="Zoom in">
                <span class="gl-ico-in"><?= icon('zoom-in') ?></span>
                <span class="gl-ico-out"><?= icon('zoom-out') ?></span>
            </button>
            <button class="gl-lightbox__btn gl-close" type="button" aria-label="Close viewer"><?= icon('close') ?></button>
        </div>
    </div>

    <div class="swiper-container glSwiper">
        <div class="swiper-wrapper">
<?php foreach ($photos as $photo): ?>
            <div class="swiper-slide" data-title="<?= e($photo['title']) ?>">
                <div class="swiper-zoom-container">
                    <img class="swiper-lazy" data-src="<?= e($photo['full']) ?>" alt="<?= e($photo['alt']) ?>">
                </div>
                <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
            </div>
<?php endforeach; ?>
        </div>
    </div>

    <button class="gl-lightbox__nav gl-prev" type="button" aria-label="Previous photo"><?= icon('chevron-left') ?></button>
    <button class="gl-lightbox__nav gl-next" type="button" aria-label="Next photo"><?= icon('chevron-right') ?></button>
    <p class="gl-lightbox__caption"></p>
</div>
<!--/ zoom viewer -->
