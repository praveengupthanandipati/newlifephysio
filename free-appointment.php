<?php
$page = 'free-appointment';
require __DIR__ . '/components/init.php';
require __DIR__ . '/components/head.php';
?>
<body>

<?php require __DIR__ . '/components/header.php'; ?>

<!-- main -->
<main>
<?php
/** @var array $appointmentPage  from data.php via init.php */
$banner = $appointmentPage['banner'];
require __DIR__ . '/components/sections/page-banner.php';
require __DIR__ . '/components/sections/appointment-booking.php';
require __DIR__ . '/components/sections/journey.php';
require __DIR__ . '/components/sections/appointment-faq.php';
?>
</main>
<!--/ main -->

<?php require __DIR__ . '/components/footer.php'; ?>

<?php require __DIR__ . '/components/scripts.php'; ?>

</body>
</html>
