<?php
$page = 'contact';
require __DIR__ . '/components/init.php';
require __DIR__ . '/components/head.php';
?>
<body>

<?php require __DIR__ . '/components/header.php'; ?>

<!-- main -->
<main>
<?php
/** @var array $contactPage  from data.php via init.php */
$banner = $contactPage['banner'];
require __DIR__ . '/components/sections/page-banner.php';
require __DIR__ . '/components/sections/contact-details.php';
?>
</main>
<!--/ main -->

<?php require __DIR__ . '/components/footer.php'; ?>

<?php require __DIR__ . '/components/scripts.php'; ?>

</body>
</html>
