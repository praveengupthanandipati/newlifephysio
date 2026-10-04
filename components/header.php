<?php
/**
 * Site header: top info bar + Bootstrap navbar (off-canvas drawer below lg).
 * Menu comes from $nav, the treatments mega menu from $treatments (data.php);
 * the active item follows $activePage (init.php).
 */

// Provided by data.php / init.php (declared for the editor)
/** @var string $activePage */
/** @var array $site */
/** @var array $nav */
/** @var array $treatmentCategories */
/** @var array $treatments */
/** @var array $megaPromo */

// Active when the item, or one of its child pages (e.g. doctors under About), is open
$navActive = function ($id) use ($activePage, $nav) {
    foreach ($nav as $item) {
        if ($item['id'] === $id) {
            return nav_is_active($item, $activePage) ? ' active' : '';
        }
    }
    return '';
};
$navCurrent = function ($id) use ($activePage) {
    return $id === $activePage ? ' aria-current="page"' : '';
};
$mainPhone = $site['phones'][0];
?>
<?php require __DIR__ . '/icons.php'; ?>

<!-- page loader: hidden by js/custom.js once the page has loaded -->
<div class="page-loader" id="load" aria-hidden="true">
    <img class="page-loader-logo" src="<?= e($site['logo']) ?>" alt="">
    <div class="page-loader-spinner"></div>
</div>
<noscript><style>.page-loader { display: none; }</style></noscript>

<!-- header -->
<header class="site-header">
    <!-- top info bar -->
    <div class="mh-topbar">
        <div class="container-90 mh-topbar__inner">
            <p class="mh-topbar__welcome">
                <span class="mh-topbar__pulse" aria-hidden="true"></span>
                Welcome to <strong><?= e($site['name']) ?></strong> &mdash; <?= e($site['doctor']['name']) ?>
            </p>

            <ul class="mh-topbar__timings">
<?php foreach ($site['hours'] as $i => $group): ?>
                <li>
                    <?php if ($i === 0): ?><?= icon('clock', 'mh-ico') ?><?php endif; ?>
                    <b><?= e($group['label']) ?>:</b> <?= e(format_slots($group['slots'])) ?>
                </li>
<?php endforeach; ?>
            </ul>

            <div class="mh-topbar__contact">
<?php foreach ($site['phones'] as $i => $phone): ?>
                <a class="mh-topbar__link<?= $i > 0 ? ' mh-topbar__phone--alt' : '' ?>" href="tel:<?= e(tel($phone)) ?>">
                    <?php if ($i === 0): ?><?= icon('phone', 'mh-ico') ?><?php endif; ?>
                    <?= e($phone) ?>
                </a>
<?php endforeach; ?>
                <a class="mh-topbar__wa" href="<?= e(whatsapp_link($site['whatsapp'], $site['whatsapp_messages']['book'])) ?>" target="_blank" rel="noopener" aria-label="Chat with us on WhatsApp">
                    <?= icon('whatsapp') ?>
                    WhatsApp
                </a>
            </div>
        </div>
    </div>
    <!--/ top info bar -->

    <!-- main bar: Bootstrap navbar, the menu becomes an off-canvas drawer below lg -->
    <nav class="navbar navbar-expand-lg mh-bar" aria-label="Main navigation">
        <div class="container-90 mh-bar__inner">
            <a class="navbar-brand mh-logo" href="index.php" aria-label="<?= e($site['name']) ?> - Home">
                <img src="<?= e($site['logo']) ?>" alt="<?= e($site['name'] . ' - ' . $site['tagline']) ?>">
            </a>

            <button class="navbar-toggler mh-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#mhOffcanvas" aria-controls="mhOffcanvas" aria-label="Open menu">
                <span></span><span></span><span></span>
            </button>

            <div class="offcanvas offcanvas-end mh-offcanvas" tabindex="-1" id="mhOffcanvas" aria-labelledby="mhOffcanvasLabel">
                <div class="offcanvas-header mh-offcanvas__head">
                    <h2 class="visually-hidden" id="mhOffcanvasLabel">Menu</h2>
                    <img src="<?= e($site['logo']) ?>" alt="" aria-hidden="true">
                    <button type="button" class="mh-offcanvas__close" data-bs-dismiss="offcanvas" aria-label="Close menu">
                        <?= icon('close') ?>
                    </button>
                </div>

                <div class="offcanvas-body mh-offcanvas__body">
                    <ul class="navbar-nav mh-nav">
<?php foreach ($nav as $item): ?>
<?php if (!empty($item['mega'])): ?>
                        <!-- treatments mega menu -->
                        <li class="nav-item dropdown mh-dropdown mh-dropdown--mega">
                            <a class="nav-link mh-nav__link dropdown-toggle<?= $navActive($item['id']) ?>" href="<?= e($item['url']) ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= e($item['label']) ?></a>
                            <div class="dropdown-menu mh-mega">
<?php foreach ($treatmentCategories as $catId => $catLabel): ?>
<?php $catItems = array_filter($treatments, function ($t) use ($catId) { return $t['cat'] === $catId; }); ?>
<?php if (!$catItems) continue; ?>
                                <div class="mh-mega__col">
                                    <h6 class="mh-mega__title"><?= e($catLabel) ?></h6>
                                    <ul class="mh-drop__list">
<?php foreach ($catItems as $t): ?>
                                        <li><a class="dropdown-item mh-drop__link" href="treatments.php#<?= e($t['slug']) ?>"><?= e($t['name']) ?></a></li>
<?php endforeach; ?>
<?php if ($catId === 'neuro'): ?>
                                        <li><a class="dropdown-item mh-drop__link mh-drop__link--all" href="<?= e($item['url']) ?>">View all treatments &rarr;</a></li>
<?php endif; ?>
                                    </ul>
                                </div>
<?php endforeach; ?>
                                <div class="mh-mega__promo">
                                    <h4><?= e($megaPromo['title']) ?></h4>
                                    <p><?= e($megaPromo['text']) ?></p>
                                    <a class="mh-mega__promo-link" href="<?= e(anchor('appointment')) ?>"><?= e($megaPromo['cta']) ?></a>
                                </div>
                            </div>
                        </li>
<?php elseif (!empty($item['children'])): ?>
                        <li class="nav-item dropdown mh-dropdown">
                            <a class="nav-link mh-nav__link dropdown-toggle<?= $navActive($item['id']) ?>" href="<?= e($item['url']) ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= e($item['label']) ?></a>
                            <ul class="dropdown-menu mh-drop">
<?php foreach ($item['children'] as $child): ?>
<?php $childCurrent = ($child['id'] ?? null) === $activePage; ?>
                                <li><a class="dropdown-item mh-drop__link<?= $childCurrent ? ' active' : '' ?>" href="<?= e($child['url']) ?>"<?= $childCurrent ? ' aria-current="page"' : '' ?>><?= e($child['label']) ?></a></li>
<?php endforeach; ?>
                            </ul>
                        </li>
<?php else: ?>
                        <li class="nav-item"><a class="nav-link mh-nav__link<?= $navActive($item['id']) ?>" href="<?= e($item['url']) ?>"<?= $navCurrent($item['id']) ?>><?= e($item['label']) ?></a></li>
<?php endif; ?>
<?php endforeach; ?>
                    </ul>

                    <a class="mh-btn-book" href="<?= e(anchor('appointment')) ?>">
                        Book Free Appointment
                        <span class="mh-btn-book__icon" aria-hidden="true"><?= icon('arrow') ?></span>
                    </a>

                    <!-- drawer footer (below lg only) -->
                    <div class="mh-offcanvas__foot d-lg-none">
                        <a class="mh-topbar__link" href="tel:<?= e(tel($mainPhone)) ?>">
                            <?= icon('phone', 'mh-ico') ?>
                            <?= e(implode(', ', $site['phones'])) ?>
                        </a>
                        <p class="mh-offcanvas__hours">
<?php foreach ($site['hours'] as $i => $group): ?>
                            <?= $i > 0 ? '<br>' : '' ?><b><?= e($group['label']) ?>:</b> <?= e(format_slots($group['slots'])) ?>
<?php endforeach; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--/ main bar -->
</header>
<!--/ header -->
