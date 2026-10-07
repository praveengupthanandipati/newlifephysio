<?php
/**
 * Home: about the clinic. Highlights from $aboutFeatures, doctor from $site.
 */
$doctor = $site['doctor'];
?>
<!-- about -->
<section class="about" id="about" aria-labelledby="aboutTitle">
    <div class="container-90">
        <div class="row align-items-center g-5">
            <!-- media -->
            <div class="col-lg-6">
                <div class="about-media" data-aos="fade-right">
                    <figure class="about-media__main">
                        <img src="img/banner03-1024.jpg" srcset="img/banner03-1024.jpg 1024w, img/banner03.jpg 1920w" sizes="(min-width: 992px) 45vw, 90vw" alt="Physiotherapist guiding a patient through a shoulder strengthening exercise" loading="lazy">
                    </figure>
                    <figure class="about-media__sub">
                        <img src="img/banner02-1024.jpg" alt="Physiotherapist supporting a patient during sling suspension therapy" loading="lazy">
                    </figure>

                    <!-- rotating brand seal -->
                    <div class="about-seal" aria-hidden="true">
                        <svg class="about-seal__ring" viewBox="0 0 120 120">
                            <defs><path id="aboutSealPath" d="M60 60m-46 0a46 46 0 1 1 92 0a46 46 0 1 1-92 0"/></defs>
                            <text><textPath href="#aboutSealPath" textLength="286" lengthAdjust="spacing"><?= e(strtoupper($site['tagline'])) ?> &#8226; NEW LIFE &#8226;</textPath></text>
                        </svg>
                        <img class="about-seal__logo" src="<?= e($site['emblem']) ?>" alt="">
                    </div>

                    <!-- registration badge -->
                    <div class="about-badge">
                        <span class="about-badge__icon" aria-hidden="true"><?= icon('shield') ?></span>
                        <span>
                            <strong>Registered Physiotherapist</strong>
                            <small>Regd. No. <?= e($doctor['reg_no']) ?></small>
                        </span>
                    </div>
                </div>
            </div>

            <!-- content -->
            <div class="col-lg-6">
                <div class="about-content" data-aos="fade-left">
                    <span class="about-eyebrow">About Us</span>
                    <h2 class="about-title" id="aboutTitle">Helping You Move, Heal &amp; Live a <span>New Life</span></h2>
                    <p class="about-lead"><?= e($site['name']) ?> provides expert physiotherapy for adults and children. We treat spine, joint, sports and neurological conditions with hands-on care and exercise plans built around each patient &mdash; so you recover faster and stay strong.</p>

                    <ul class="about-features">
<?php foreach ($aboutFeatures as $feature): ?>
                        <li>
                            <span class="about-features__icon" aria-hidden="true"><?= icon($feature['icon']) ?></span>
                            <span><strong><?= e($feature['title']) ?></strong><small><?= e($feature['text']) ?></small></span>
                        </li>
<?php endforeach; ?>
                    </ul>

                    <div class="about-doctor">
                        <span class="about-doctor__avatar" aria-hidden="true"><?= e($doctor['initials']) ?></span>
                        <span class="about-doctor__info">
                            <strong><?= e($doctor['name']) ?></strong>
                            <small><?= e($doctor['role']) ?> &middot; Regd. No. <?= e($doctor['reg_no']) ?></small>
                        </span>
                        <a class="about-doctor__call" href="tel:<?= e(tel($site['phones'][0])) ?>" aria-label="Call <?= e($doctor['name']) ?> on <?= e($site['phones'][0]) ?>">
                            <?= icon('phone') ?>
                        </a>
                    </div>

                    <div class="about-actions">
                        <a class="about-btn about-btn--primary" href="about.php">
                            More About Us
                            <span aria-hidden="true"><?= icon('arrow') ?></span>
                        </a>
                        <a class="about-btn about-btn--ghost" href="<?= e(booking_url()) ?>">Book Free Consultation</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ about -->
