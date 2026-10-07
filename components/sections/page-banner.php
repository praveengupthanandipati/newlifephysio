<?php
/**
 * Inner-page banner: photo + navy overlay, breadcrumb and page title.
 * Set $banner before including:
 *   ['title' => 'About', 'highlight' => 'New Life Physiotherapy',
 *    'lead' => '...', 'image' => 'banner02']   // image = img/<name>.jpg + -1024.jpg
 * The breadcrumb follows the page's place in $nav (nav_trail), so child
 * pages read e.g. Home › About Us › Dr. Y. Abhilash (PT).
 */

// Provided by data.php / init.php (declared for the editor)
/** @var array $banner */
/** @var string $activePage */

$trail = nav_trail($activePage) ?: [['label' => trim($banner['title'] . ' ' . $banner['highlight']), 'url' => '']];
$lastCrumb = count($trail) - 1;
?>
<!-- page banner -->
<section class="page-banner">
    <img class="page-banner__img" src="img/<?= e($banner['image']) ?>.jpg" srcset="img/<?= e($banner['image']) ?>-1024.jpg 1024w, img/<?= e($banner['image']) ?>.jpg 1920w" sizes="100vw" alt="">
    <div class="container-90 page-banner__inner">
        <nav class="page-banner__crumbs" aria-label="Breadcrumb">
            <ol>
                <li><a href="index.php">Home</a></li>
<?php foreach ($trail as $i => $crumb): ?>
<?php if ($i === $lastCrumb): ?>
                <li aria-current="page"><?= e($crumb['label']) ?></li>
<?php else: ?>
                <li><a href="<?= e($crumb['url']) ?>"><?= e($crumb['label']) ?></a></li>
<?php endif; ?>
<?php endforeach; ?>
            </ol>
        </nav>
        <h1 class="page-banner__title"><?= e($banner['title']) ?> <span><?= e($banner['highlight']) ?></span></h1>
        <p class="page-banner__lead"><?= e($banner['lead']) ?></p>
    </div>
</section>
<!--/ page banner -->
