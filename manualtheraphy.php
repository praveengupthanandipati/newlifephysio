<?php
$page = 'about';
require __DIR__ . '/components/init.php';
require __DIR__ . '/components/head.php';
?>
<body>

<?php require __DIR__ . '/components/header.php'; ?>

<!-- main -->
<main>
<?php
/** @var array $aboutPage  from data.php via init.php */
$banner = $aboutPage['banner'];
require __DIR__ . '/components/sections/page-banner.php';
require __DIR__ . '/components/sections/who-we-are.php';
require __DIR__ . '/components/sections/why-us.php';
?>
</main>
<!--/ main -->

<?php require __DIR__ . '/components/footer.php'; ?>

<?php require __DIR__ . '/components/scripts.php'; ?>

</body>
</html>
