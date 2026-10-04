<?php
$page = 'doctors';
require __DIR__ . '/components/init.php';
require __DIR__ . '/components/head.php';
?>
<body>

<?php require __DIR__ . '/components/header.php'; ?>

<!-- main -->
<main>
<?php
/** @var array $doctorPage  from data.php via init.php */
$banner = $doctorPage['banner'];
require __DIR__ . '/components/sections/page-banner.php';
require __DIR__ . '/components/sections/doctor-profile.php';
require __DIR__ . '/components/sections/doctor-experience.php';
require __DIR__ . '/components/sections/doctor-advantages.php';
?>
</main>
<!--/ main -->

<?php require __DIR__ . '/components/footer.php'; ?>

<?php require __DIR__ . '/components/scripts.php'; ?>

</body>
</html>
