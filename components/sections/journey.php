<?php
/**
 * Home: journey to recovery timeline from $journeySteps.
 * js/custom.js adds .is-inview to .jr-steps to draw the line.
 *
 * --jr-count / --jr-i let _journey.scss size the grid, place the line and
 * stagger the node lighting for however many steps data.php defines.
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $site */
/** @var array $journeySteps */
$hoursText = 'Open ' . implode('; ', array_map(function ($group) {
    return $group['label'] . ' ' . format_slots($group['slots']);
}, $site['hours'])) . '.';
?>
<!-- journey to recovery -->
<section class="journey-to-recovery" id="journey" aria-labelledby="journeyTitle">
    <div class="container-90">
        <div class="jr-head">
            <div class="jr-head__text" data-aos="fade-up">
                <span class="jr-eyebrow">How It Works</span>
                <h2 class="jr-title" id="journeyTitle">Your Journey to <span>Recovery</span></h2>
                <p class="jr-lead">A clear, step-by-step path from your first call to moving freely again &mdash; with <?= e($site['doctor']['name']) ?> guiding you all the way.</p>
            </div>
            <a class="jr-head__btn" href="<?= e(booking_url()) ?>" data-aos="fade-up" data-aos-delay="100">
                Start Your Journey
                <span aria-hidden="true"><?= icon('arrow') ?></span>
            </a>
        </div>

        <ol class="jr-steps" style="--jr-count: <?= count($journeySteps) ?>">
<?php foreach ($journeySteps as $i => $step): ?>
<?php $num = sprintf('%02d', $i + 1); ?>
            <li class="jr-step" style="--jr-i: <?= $i ?>" data-aos="fade-up"<?= $i > 0 ? ' data-aos-delay="' . ($i * 120) . '"' : '' ?>>
                <div class="jr-step__node" aria-hidden="true">
                    <?= icon($step['icon']) ?>
                    <span class="jr-step__num"><?= $num ?></span>
                </div>
                <div class="jr-step__card">
                    <span class="jr-step__label">Step <?= $num ?></span>
                    <h3 class="jr-step__title"><?= e($step['title']) ?></h3>
                    <p class="jr-step__text"><?= e($step['text']) ?><?= !empty($step['show_hours']) ? ' ' . e($hoursText) : '' ?></p>
                </div>
            </li>
<?php endforeach; ?>
        </ol>
    </div>
</section>
<!--/ journey to recovery -->
