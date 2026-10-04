<?php
/**
 * Doctor page: clinical experience. Expertise areas list their conditions
 * straight from $treatments (by 'cat') or from a hand-written 'items' list.
 * The career timeline renders only once $doctorPage['experience']['timeline']
 * has entries.
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $doctorPage */
/** @var array $treatments */

$exp = $doctorPage['experience'];
?>
<!-- doctor experience -->
<section class="doc-exp" id="experience" aria-labelledby="docExpTitle">
    <div class="container-90">
        <div class="doc-exp__head" data-aos="fade-up">
            <span class="doc-eyebrow"><?= e($exp['eyebrow']) ?></span>
            <h2 class="doc-title" id="docExpTitle"><?= e($exp['title']) ?> <span><?= e($exp['highlight']) ?></span></h2>
            <p class="doc-text"><?= e($exp['lead']) ?></p>
        </div>

        <div class="doc-exp__grid">
<?php foreach ($exp['areas'] as $i => $area): ?>
<?php
    $items = isset($area['cat'])
        ? array_filter($treatments, function ($t) use ($area) { return $t['cat'] === $area['cat']; })
        : array_map(function ($label) { return ['name' => $label]; }, $area['items'] ?? []);
?>
            <article class="doc-area" data-aos="fade-up" data-aos-delay="<?= ($i % 3) * 120 ?>">
                <div class="doc-area__top">
                    <span class="doc-area__icon" aria-hidden="true"><?= icon($area['icon']) ?></span>
<?php if (isset($area['cat'])): ?>
                    <span class="doc-area__count"><?= count($items) ?> conditions</span>
<?php endif; ?>
                </div>
                <h3 class="doc-area__title"><?= e($area['title']) ?></h3>
                <p class="doc-area__text"><?= e($area['text']) ?></p>
<?php if ($items): ?>
                <ul class="doc-area__list">
<?php foreach ($items as $item): ?>
                    <li><?php if (isset($item['slug'])): ?><a href="treatments.php#<?= e($item['slug']) ?>"><?= e($item['name']) ?></a><?php else: ?><?= e($item['name']) ?><?php endif; ?></li>
<?php endforeach; ?>
                </ul>
<?php endif; ?>
            </article>
<?php endforeach; ?>
        </div>

<?php if ($exp['timeline']): ?>
        <!-- career timeline -->
        <div class="doc-timeline" data-aos="fade-up">
            <h3 class="doc-timeline__title">Career Journey</h3>
            <ol>
<?php foreach ($exp['timeline'] as $entry): ?>
                <li>
                    <span class="doc-timeline__period"><?= e($entry['period']) ?></span>
                    <strong><?= e($entry['title']) ?></strong>
                    <span class="doc-timeline__place"><?= e($entry['place']) ?></span>
                </li>
<?php endforeach; ?>
            </ol>
        </div>
<?php endif; ?>
    </div>
</section>
<!--/ doctor experience -->
