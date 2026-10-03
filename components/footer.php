<?php
/**
 * Site footer: about + social / quick links / services / contact, then the
 * copyright bar. Everything comes from data.php.
 */
$addressLine = implode(', ', array_filter([
    $site['address']['street'] ?: '[Clinic street address]', // TODO placeholder until set in data.php
    $site['address']['city'],
    $site['address']['region'],
    $site['address']['postal_code'],
]));
?>
<!-- footer -->
<footer class="site-footer">
    <!-- row 1: about / links / services / contact -->
    <div class="ft-main">
        <div class="container-90">
            <div class="row g-5">
                <!-- about + social -->
                <div class="col-lg-4 col-md-6">
                    <a class="ft-logo" href="index.php" aria-label="<?= e($site['name']) ?> - Home">
                        <img src="<?= e($site['logo']) ?>" alt="<?= e($site['name'] . ' - ' . $site['tagline']) ?>" loading="lazy">
                    </a>
                    <p class="ft-about">Expert physiotherapy for adults and children &mdash; spine, joint, sports and neuro rehabilitation led by <?= e($site['doctor']['name']) ?>, Regd. No. <?= e($site['doctor']['reg_no']) ?>.</p>

                    <ul class="ft-social" aria-label="Social media">
<?php foreach ($socialNetworks as $key => $network): ?>
                        <li><a class="<?= e($network['class']) ?>" href="<?= e($site['social'][$key] ?: '#') ?>" target="_blank" rel="noopener" aria-label="<?= e($network['label']) ?>"><?= icon($network['icon']) ?></a></li>
<?php endforeach; ?>
                        <li><a class="ft-social__wa" href="<?= e(whatsapp_link($site['whatsapp'])) ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><?= icon('whatsapp') ?></a></li>
                    </ul>
                </div>

                <!-- quick links -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h5 class="ft-heading">Quick Links</h5>
                    <ul class="ft-links">
<?php foreach ($nav as $item): ?>
                        <li><a href="<?= e($item['url']) ?>"><?= e($item['label']) ?></a></li>
<?php endforeach; ?>
                    </ul>
                </div>

                <!-- services -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h5 class="ft-heading">Our Services</h5>
                    <ul class="ft-links">
<?php foreach ($footerServices as $link): ?>
                        <li><a href="<?= e(isset($link['anchor']) ? anchor($link['anchor']) : $link['url']) ?>"><?= e($link['label']) ?></a></li>
<?php endforeach; ?>
                    </ul>
                </div>

                <!-- contact -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="ft-heading">Get in Touch</h5>
                    <ul class="ft-contact">
                        <li>
                            <span class="ft-contact__icon" aria-hidden="true"><?= icon('map-pin') ?></span>
                            <span>
                                <small>Address</small>
                                <address><?= e($addressLine) ?></address>
                            </span>
                        </li>
                        <li>
                            <span class="ft-contact__icon" aria-hidden="true"><?= icon('phone') ?></span>
                            <span>
                                <small>Call for Appointments</small>
                                <?= implode(', ', array_map(function ($phone) {
                                    return '<a href="tel:' . e(tel($phone)) . '">' . e($phone) . '</a>';
                                }, $site['phones'])) ?>
                            </span>
                        </li>
                        <li>
                            <span class="ft-contact__icon" aria-hidden="true"><?= icon('mail') ?></span>
                            <span>
                                <small>Email</small>
<?php if ($site['email']): ?>
                                <a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a>
<?php else: ?>
                                <a href="mailto:">[your-email@clinic.com]</a><?php /* TODO: set $site['email'] in data.php */ ?>
<?php endif; ?>
                            </span>
                        </li>
                        <li>
                            <span class="ft-contact__icon" aria-hidden="true"><?= icon('clock') ?></span>
                            <span>
                                <small>Timings</small>
<?php foreach ($site['hours'] as $i => $group): ?>
                                <?= $i > 0 ? '<br>' : '' ?><?= e($group['label']) ?>: <?= e(format_slots($group['slots'])) ?>
<?php endforeach; ?>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- row 2: copyright bar -->
    <div class="ft-bottom">
        <div class="container-90 ft-bottom__inner">
            <p>&copy; <span id="footerYear"><?= date('Y') ?></span> <?= e($site['name']) ?>. All rights reserved.</p>
            <ul class="ft-bottom__links">
<?php foreach ($legalLinks as $link): ?>
                <li><a href="<?= e($link['url']) ?>"><?= e($link['label']) ?></a></li>
<?php endforeach; ?>
            </ul>
            <a class="ft-top" href="#" aria-label="Back to top">
                <?= icon('arrow-up') ?>
            </a>
        </div>
    </div>
</footer>
<!--/ footer -->
