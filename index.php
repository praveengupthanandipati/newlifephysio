<?php
$page = 'home';
require __DIR__ . '/components/init.php';
require __DIR__ . '/components/head.php';
?>
<body>

<?php require __DIR__ . '/components/header.php'; ?>

<!-- main -->
<main>
<?php
require __DIR__ . '/components/sections/hero.php';
require __DIR__ . '/components/sections/services.php';
require __DIR__ . '/components/sections/about.php';
require __DIR__ . '/components/sections/journey.php';
?>
</main>
<!--/ main -->

<?php require __DIR__ . '/components/footer.php'; ?>

<?php require __DIR__ . '/components/scripts.php'; ?>

</body>
</html>
