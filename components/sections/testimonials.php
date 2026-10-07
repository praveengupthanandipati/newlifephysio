<?php
/**
 * Home: patient testimonials. Swiper carousel from $testimonials,
 * initialised in js/custom.js (1 / 2 / 3 cards per view by screen width).
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $testimonials */
?>
<!-- testimonials -->
<section class="testimonials-home" id="testimonials" aria-labelledby="testimonialsTitle">
    <div class="container-90">
        <div class="svc-head" data-aos="fade-up">
            <span class="svc-eyebrow">Testimonials</span>
            <h2 class="svc-title" id="testimonialsTitle">What Our <span>Patients Say</span></h2>
            <p class="svc-lead">Real stories from people who trusted us with their recovery &mdash; and got back to doing what they love.</p>
        </div>

        <div class="tm-carousel" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-container tmSwiper">
                <div class="swiper-wrapper">
<?php foreach ($testimonials as $t): ?>
<?php $initials = implode('', array_map(function ($part) {
    return mb_substr($part, 0, 1);
}, array_slice(explode(' ', $t['name']), 0, 2))); ?>
                    <div class="swiper-slide">
                        <figure class="tm-card">
                            <span class="tm-card__quote" aria-hidden="true"><?= icon('quote') ?></span>
                            <div class="tm-card__stars" role="img" aria-label="Rated <?= (int) $t['rating'] ?> out of 5">
<?php for ($s = 1; $s <= 5; $s++): ?>
                                <?= icon('star', $s <= $t['rating'] ? 'is-on' : '') ?>
<?php endfor; ?>
                            </div>
                            <blockquote class="tm-card__text">
                                <p><?= e($t['text']) ?></p>
                            </blockquote>
                            <figcaption class="tm-card__author">
                                <span class="tm-card__avatar" aria-hidden="true"><?= e($initials) ?></span>
                                <span>
                                    <strong><?= e($t['name']) ?></strong>
                                    <small><?= e($t['condition']) ?></small>
                                </span>
                            </figcaption>
                        </figure>
                    </div>
<?php endforeach; ?>
                </div>
            </div>

            <!-- controls -->
            <div class="tm-controls">
                <button class="tm-nav tm-prev" type="button" aria-label="Previous testimonial"><?= icon('chevron-left') ?></button>
                <div class="tm-pagination"></div>
                <button class="tm-nav tm-next" type="button" aria-label="Next testimonial"><?= icon('chevron-right') ?></button>
            </div>
        </div>
    </div>
</section>
<!--/ testimonials -->
