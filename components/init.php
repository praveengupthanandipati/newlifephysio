<?php
/**
 * Bootstraps a page. Set $page first, then require this file:
 *
 *   $page = 'home';   // key in $seoPages / $nav: home, about, treatments, ...
 *   require __DIR__ . '/components/init.php';
 */
require __DIR__ . '/functions.php';
require __DIR__ . '/data.php';
require __DIR__ . '/seo.php';

$page = $page ?? 'home';
$activePage = $page;
$seo = page_seo($page);
