<?php
$page = 'whychooseus';
require __DIR__ . '/components/init.php';
require __DIR__ . '/components/head.php';
?>
<body>

<?php require __DIR__ . '/components/header.php'; ?>

<!-- main -->
<main>
<?php
/** @var array $whyPage  from data.php via init.php */
$banner = $whyPage['banner'];
require __DIR__ . '/components/sections/page-banner.php';
require __DIR__ . '/components/sections/why-us.php';
require __DIR__ . '/components/sections/care-promise.php';
require __DIR__ . '/components/sections/journey.php';
require __DIR__ . '/components/sections/cta-band.php';
?>
</main>
<!--/ main -->

<?php require __DIR__ . '/components/footer.php'; ?>

<?php require __DIR__ . '/components/scripts.php'; ?>

</body>
</html>
