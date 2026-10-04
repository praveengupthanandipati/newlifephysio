<?php
/**
 * Google Analytics 4 + search engine verification tags, printed in <head>.
 * Driven by $site['analytics'] (data.php); empty values print nothing.
 *
 * Events sent from js/custom.js (window.nlTrack) once GA4 is active:
 *   generate_lead      booking form submitted successfully (mark as Key event)
 *   click_call         any tel: link                       (mark as Key event)
 *   click_whatsapp     any WhatsApp link                   (mark as Key event)
 *   click_email        any mailto: link
 *   click_book_cta     any "Book…" link to the booking form
 *   select_content     condition chosen in the treatments "Jump to" menu
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $site */

$analytics = $site['analytics'];
?>
<?php if ($analytics['gsc_verification']): ?>
    <meta name="google-site-verification" content="<?= e($analytics['gsc_verification']) ?>">
<?php endif; ?>
<?php if ($analytics['bing_verification']): ?>
    <meta name="msvalidate.01" content="<?= e($analytics['bing_verification']) ?>">
<?php endif; ?>
<?php if ($analytics['ga4_id']): ?>
    <!-- Google Analytics 4 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= e($analytics['ga4_id']) ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', <?= json_encode($analytics['ga4_id']) ?>);
    </script>
<?php endif; ?>
