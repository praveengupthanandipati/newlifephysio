<?php
/**
 * Inner-page banner: photo + navy overlay, breadcrumb and page title.
 * Set $banner before including:
 *   ['title' => 'About', 'highlight' => 'New Life Physiotherapy',
 *    'lead' => '...', 'image' => 'banner02']   // image = img/<name>.jpg + -1024.jpg
 * The breadcrumb label is the current page's menu label from $nav.
 */

// Provided by data.php / init.php (declared for the editor)
/** @var array $banner */
/** @var array $nav */
/** @var string $activePage */

$crumb = $banner['title'];
foreach ($nav as $item) {
    if ($item['id'] === $activePage) {
        $crumb = $item['label'];
    }
}
?>
<!-- page banner -->
<section class="page-banner">
    <img class="page-banner__img" src="img/<?= e($banner['image']) ?>.jpg" srcset="img/<?= e($banner['image']) ?>-1024.jpg 1024w, img/<?= e($banner['image']) ?>.jpg 1920w" sizes="100vw" alt="">
    <div class="container-90 page-banner__inner">
        <nav class="page-banner__crumbs" aria-label="Breadcrumb">
            <ol>
                <li><a href="index.php">Home</a></li>
                <li aria-current="page"><?= e($crumb) ?></li>
            </ol>
        </nav>
        <h1 class="page-banner__title"><?= e($banner['title']) ?> <span><?= e($banner['highlight']) ?></span></h1>
        <p class="page-banner__lead"><?= e($banner['lead']) ?></p>
    </div>
</section>
<!--/ page banner -->
