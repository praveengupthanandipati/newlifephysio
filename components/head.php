<?php
/**
 * Document head: SEO meta, social sharing tags, structured data, favicons
 * and stylesheets. Content comes from $seo (init.php -> seo.php).
 */

// Provided by init.php / data.php (declared for the editor)
/** @var array $seo */
/** @var array $site */
/** @var string $page */
$canonical = absolute_url($seo['path']);
$shareImage = absolute_url($seo['image']) ?? $seo['image'];
?>
<!DOCTYPE html>
<html lang="en-IN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO -->
    <title><?= e($seo['title']) ?></title>
    <meta name="description" content="<?= e($seo['description']) ?>">
    <meta name="keywords" content="<?= e($seo['keywords']) ?>">
    <meta name="robots" content="<?= e($seo['robots']) ?>">
    <meta name="author" content="<?= e($site['name']) ?>">
<?php if ($canonical): ?>
    <link rel="canonical" href="<?= e($canonical) ?>">
<?php endif; ?>
<?php require __DIR__ . '/analytics.php'; ?>

    <!-- local SEO -->
    <meta name="geo.region" content="<?= e($site['address']['region_code']) ?>">
    <meta name="geo.placename" content="<?= e($site['address']['city']) ?>">

    <!-- social sharing (Facebook, WhatsApp, LinkedIn) -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?= e($site['name']) ?>">
    <meta property="og:locale" content="en_IN">
    <meta property="og:title" content="<?= e($seo['title']) ?>">
    <meta property="og:description" content="<?= e($seo['description']) ?>">
    <meta property="og:image" content="<?= e($shareImage) ?>">
<?php if ($canonical): ?>
    <meta property="og:url" content="<?= e($canonical) ?>">
<?php endif; ?>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($seo['title']) ?>">
    <meta name="twitter:description" content="<?= e($seo['description']) ?>">
    <meta name="twitter:image" content="<?= e($shareImage) ?>">

    <!-- structured data -->
<?php foreach (page_schema($page) as $schema): ?>
    <script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) ?></script>
<?php endforeach; ?>

    <!-- favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="img/favicon-192.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png" />
    <meta name="theme-color" content="#173f87" />

    <!-- styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/swiper.min.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
