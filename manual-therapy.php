<?php
$page = 'manual-therapy';
require __DIR__ . '/components/init.php';
require __DIR__ . '/components/head.php';
?>
<body>

<?php require __DIR__ . '/components/header.php'; ?>

<!-- main -->
<main>
<?php
/** @var array $specialityPages  from data.php via init.php */
$banner = $specialityPages[$page]['banner'];
require __DIR__ . '/components/sections/page-banner.php';
require __DIR__ . '/components/sections/speciality.php';
require __DIR__ . '/components/sections/cta-band.php';
?>
</main>
<!--/ main -->

<?php require __DIR__ . '/components/footer.php'; ?>

<?php require __DIR__ . '/components/scripts.php'; ?>

</body>
</html>
