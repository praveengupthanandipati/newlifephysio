<?php
/**
 * Closing call-to-action band, usable at the end of any page.
 * Text from $ctaBand; phones / WhatsApp from $site.
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $site */
/** @var array $ctaBand */

$mainPhone = $site['phones'][0];
?>
<!-- call to action -->
<section class="cta-band" aria-labelledby="ctaTitle">
    <div class="container-90">
        <div class="cta-band__box" data-aos="zoom-in">
            <img class="cta-band__emblem" src="<?= e($site['emblem']) ?>" alt="" aria-hidden="true" loading="lazy">
            <div class="cta-band__text">
                <h2 id="ctaTitle"><?= e($ctaBand['title']) ?> <span><?= e($ctaBand['highlight']) ?></span></h2>
                <p><?= e($ctaBand['text']) ?></p>
            </div>
            <div class="cta-band__actions">
                <a class="cta-band__btn cta-band__btn--book" href="<?= e(anchor('appointment')) ?>">Book Free Consultation <?= icon('arrow') ?></a>
                <a class="cta-band__btn cta-band__btn--call" href="tel:<?= e(tel($mainPhone)) ?>"><?= icon('phone') ?><?= e($mainPhone) ?></a>
                <a class="cta-band__btn cta-band__btn--wa" href="<?= e(whatsapp_link($site['whatsapp'], $site['whatsapp_messages']['book'])) ?>" target="_blank" rel="noopener" aria-label="Chat with us on WhatsApp"><?= icon('whatsapp') ?>WhatsApp</a>
            </div>
        </div>
    </div>
</section>
<!--/ call to action -->
