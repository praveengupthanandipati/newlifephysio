<?php
/**
 * Doctor page: highlights strip under the banner (experience, specialization,
 * location, languages, Google rating). Overlaps the banner's bottom edge.
 * Values from $doctorPage['profile'] and $site; empty ones are skipped.
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $site */
/** @var array $doctorPage */

$profile = $doctorPage['profile'];
$rating = (int) $profile['google_rating'];
// last part of the street line is the area, e.g. "Manikonda"
$streetParts = explode(', ', $site['address']['street']);
$area = end($streetParts);

$highlights = array_filter([
    $profile['experience_years'] ? ['assess', 'Expertise', $profile['experience_years'] . '+ Years'] : null,
    $profile['specialization'] ? ['treat', 'Specialization', $profile['specialization']] : null,
    ['map-pin', 'Location', $area . ', ' . $site['address']['city']],
    $profile['languages'] ? ['language', 'Languages', $profile['languages']] : null,
    $rating ? ['star', 'Google Rating', ''] : null,
]);
?>
<!-- doctor highlights -->
<section class="doc-highlights" aria-label="Doctor highlights">
    <div class="container-90">
        <ul class="doc-highlights__list" data-aos="fade-up">
<?php foreach ($highlights as [$hlIcon, $hlLabel, $hlValue]): ?>
            <li class="doc-highlights__item">
                <span class="doc-highlights__icon" aria-hidden="true"><?= icon($hlIcon) ?></span>
                <span class="doc-highlights__body">
                    <strong><?= e($hlLabel) ?></strong>
<?php if ($hlIcon === 'star'): ?>
                    <span class="doc-highlights__value doc-highlights__rating">
                        <span class="doc-highlights__stars" role="img" aria-label="<?= $rating ?> out of 5 stars"><?= str_repeat(icon('star'), $rating) ?></span>
                        <?= $rating ?>.0 Customer Rating
                    </span>
<?php else: ?>
                    <span class="doc-highlights__value"><?= e($hlValue) ?></span>
<?php endif; ?>
                </span>
            </li>
<?php endforeach; ?>
        </ul>
    </div>
</section>
<!--/ doctor highlights -->
