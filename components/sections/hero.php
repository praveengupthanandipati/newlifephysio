<?php
/**
 * Home hero: Swiper carousel ($heroSlides) + fixed booking card.
 * Booking form field names match the validation in js/custom.js.
 */
$mainPhone = $site['phones'][0];
?>
<!-- carousel -->
<section class="home-carousel" aria-label="Welcome">
    <div class="swiper-container heroSwiper">
        <div class="swiper-wrapper">
<?php foreach ($heroSlides as $i => $slide): ?>
<?php $headingTag = $i === 0 ? 'h1' : 'h2'; // one h1 per page ?>
            <!-- slide <?= $i + 1 ?> -->
            <div class="swiper-slide hero-slide">
                <img class="hero-slide__img<?= $slide['focus'] ? ' hero-slide__img--' . e($slide['focus']) : '' ?>" src="img/<?= e($slide['image']) ?>.jpg" srcset="img/<?= e($slide['image']) ?>-1024.jpg 1024w, img/<?= e($slide['image']) ?>.jpg 1920w" sizes="100vw" alt="<?= e($slide['alt']) ?>"<?= $i > 0 ? ' loading="lazy"' : '' ?>>
                <div class="container-90 hero-slide__inner">
                    <div class="hero-slide__text">
                        <ul class="hero-badges">
<?php foreach ($slide['badges'] as [$badgeIcon, $badgeText]): ?>
                            <li><?= icon($badgeIcon) ?><?= e($badgeText) ?></li>
<?php endforeach; ?>
                        </ul>
                        <<?= $headingTag ?> class="hero-slide__title"><?= e($slide['title']) ?> <span><?= e($slide['highlight']) ?></span></<?= $headingTag ?>>
                        <p class="hero-slide__lead"><?= e($slide['lead']) ?></p>
                        <div class="hero-slide__actions">
                            <a class="hero-btn hero-btn--call" href="tel:<?= e(tel($mainPhone)) ?>">
                                <?= icon('phone') ?>
                                Call Now : <?= e($mainPhone) ?>
                            </a>
                            <a class="hero-btn hero-btn--ghost" href="<?= e($slide['link']['url']) ?>"><?= e($slide['link']['label']) ?></a>
                        </div>
                    </div>
                </div>
            </div>
<?php endforeach; ?>
        </div>

        <!-- controls -->
        <div class="container-90 hero-controls">
            <button class="hero-arrow hero-prev" type="button" aria-label="Previous slide"><?= icon('chevron-left') ?></button>
            <div class="hero-pagination"></div>
            <button class="hero-arrow hero-next" type="button" aria-label="Next slide"><?= icon('chevron-right') ?></button>
        </div>
    </div>

    <!-- booking card (stays put while slides change) -->
    <div class="hero-form-wrap">
        <div class="container-90 hero-form-wrap__inner">
            <div class="hero-form" id="appointment">
                <div class="hero-form__head">
                    <h3>Book <span>FREE</span> Consultation</h3>
                    <p>We'll call you back to confirm your slot.</p>
                </div>
                <form class="hero-form__body" id="apptForm" action="appointment.php" method="post" novalidate>
                    <div class="hero-field">
                        <label class="visually-hidden" for="apptName">Full name</label>
                        <input class="form-control" id="apptName" type="text" name="name" placeholder="Enter your full name" autocomplete="name" maxlength="80">
                        <div class="hero-field__error" data-error-for="name"></div>
                    </div>
                    <div class="hero-field">
                        <label class="visually-hidden" for="apptPhone">Mobile number</label>
                        <div class="input-group">
                            <span class="input-group-text"><small>IN</small>&nbsp;+91</span>
                            <input class="form-control" id="apptPhone" type="tel" name="phone" placeholder="Phone number" autocomplete="tel-national" inputmode="numeric" maxlength="15">
                        </div>
                        <div class="hero-field__error" data-error-for="phone"></div>
                    </div>
                    <div class="hero-field">
                        <label class="visually-hidden" for="apptTreatment">Treatment</label>
                        <select class="form-select" id="apptTreatment" name="treatment">
                            <option value="">Select Treatment</option>
<?php foreach ($treatmentCategories as $catId => $catLabel): ?>
<?php $catItems = array_filter($treatments, function ($t) use ($catId) { return $t['cat'] === $catId; }); ?>
<?php if (!$catItems) continue; ?>
                            <optgroup label="<?= e($catLabel) ?>">
<?php foreach ($catItems as $t): ?>
                                <option><?= e($t['name']) ?></option>
<?php endforeach; ?>
                            </optgroup>
<?php endforeach; ?>
<?php foreach ($bookingExtraOptions as $option): ?>
                            <option><?= e($option) ?></option>
<?php endforeach; ?>
                        </select>
                        <div class="hero-field__error" data-error-for="treatment"></div>
                    </div>
                    <div class="hero-field">
                        <label class="visually-hidden" for="apptCity">City</label>
                        <select class="form-select" id="apptCity" name="city">
                            <option value="">Select City</option>
<?php foreach ($site['cities'] as $city): ?>
                            <option><?= e($city) ?></option>
<?php endforeach; ?>
                        </select>
                        <div class="hero-field__error" data-error-for="city"></div>
                    </div>
                    <button class="hero-form__submit" id="apptSubmit" type="submit">Book Free Consultation</button>
                    <div class="contact-alert" id="apptAlert" role="status" hidden></div>
                    <p class="hero-form__note">
                        <?= icon('lock') ?>
                        Your details are safe with us. We respect your medical privacy.
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
<!--/ carousel-->
