<?php
/**
 * Site footer: about + social / quick links / specialities / contact, then
 * the copyright bar. Everything comes from data.php. Links to pages that
 * don't exist yet (legal pages) and empty social profiles are left out.
 */

// Provided by data.php / init.php (declared for the editor)
/** @var array $site */
/** @var string $activePage */
/** @var array $socialNetworks */
/** @var array $footerQuickLinks */
/** @var array $footerSpecialities */
/** @var array $legalLinks */

$addressLine = implode(', ', array_filter([
    $site['address']['street'], // TODO: set the street address in data.php
    $site['address']['city'],
    $site['address']['region'],
    $site['address']['postal_code'],
]));
$footerLegal = array_filter($legalLinks, function ($link) {
    return is_file(__DIR__ . '/../' . $link['url']);
});
?>
<!-- footer -->
<footer class="site-footer">
    <!-- row 1: about / links / services / contact -->
    <div class="ft-main">
        <div class="container-90">
            <div class="row g-5">
                <!-- about + social -->
                <div class="col-lg-3 col-md-6">
                    <a class="ft-logo" href="index.php" aria-label="<?= e($site['name']) ?> - Home">
                        <img src="<?= e($site['logo']) ?>" alt="<?= e($site['name'] . ' - ' . $site['tagline']) ?>" loading="lazy">
                    </a>
                    <p class="ft-about">Expert physiotherapy for adults and children &mdash; spine, joint, sports and neuro rehabilitation led by <?= e($site['doctor']['name']) ?>, Regd. No. <?= e($site['doctor']['reg_no']) ?>.</p>

                    <ul class="ft-social" aria-label="Social media">
<?php foreach ($socialNetworks as $key => $network): ?>
<?php if (empty($site['social'][$key])) continue; // TODO: add profile URLs in data.php ?>
                        <li><a class="<?= e($network['class']) ?>" href="<?= e($site['social'][$key]) ?>" target="_blank" rel="noopener" aria-label="<?= e($network['label']) ?>"><?= icon($network['icon']) ?></a></li>
<?php endforeach; ?>
                        <li><a class="ft-social__wa" href="<?= e(whatsapp_link($site['whatsapp'])) ?>" target="_blank" rel="noopener" aria-label="WhatsApp"><?= icon('whatsapp') ?></a></li>
                    </ul>
                </div>

                <!-- quick links -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h5 class="ft-heading">Quick Links</h5>
                    <ul class="ft-links">
<?php foreach ($footerQuickLinks as $link): ?>
                        <li><a href="<?= e($link['url']) ?>"<?= $link['url'] === $activePage . '.php' || ($activePage === 'home' && $link['url'] === 'index.php') ? ' aria-current="page"' : '' ?>><?= e($link['label']) ?></a></li>
<?php endforeach; ?>
                    </ul>
                </div>

                <!-- specialities -->
                <div class="col-lg-3 col-md-6 col-6">
                    <h5 class="ft-heading">Specialities</h5>
                    <ul class="ft-links">
<?php foreach ($footerSpecialities as $link): ?>
                        <li><a href="<?= e($link['url']) ?>"<?= ($link['id'] ?? null) === $activePage ? ' aria-current="page"' : '' ?>><?= e($link['label']) ?></a></li>
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
                                <address><a href="<?= e(map_directions_url()) ?>" target="_blank" rel="noopener"><?= e($addressLine) ?></a></address>
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
<?php if ($site['email']): ?>
                                <small>Email</small>
                                <a href="mailto:<?= e($site['email']) ?>"><?= e($site['email']) ?></a>
<?php else: // TODO: set $site['email'] in data.php to show the address here ?>
                                <small>Write to Us</small>
                                <a href="contact.php">Send us a message</a>
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
<?php if ($footerLegal): ?>
            <ul class="ft-bottom__links">
<?php foreach ($footerLegal as $link): ?>
                <li><a href="<?= e($link['url']) ?>"><?= e($link['label']) ?></a></li>
<?php endforeach; ?>
            </ul>
<?php endif; ?>
            <a class="ft-top" href="#" aria-label="Back to top">
                <?= icon('arrow-up') ?>
            </a>
        </div>
    </div>
</footer>
<!--/ footer -->
