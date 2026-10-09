<?php
/**
 * Treatments page: every condition with a short overview, common signs and
 * how physiotherapy helps, grouped by category.
 *
 * Each condition is an anchor (#slug) so links from the mega menu, home
 * cards and footer land on its section; each group is #cat-<id>.
 * Desktop: sticky contents list with Bootstrap ScrollSpy (js/custom.js).
 * Mobile: "Jump to a condition" select.
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $site */
/** @var array $treatments */
/** @var array $treatmentCategories */
/** @var array $treatmentCategoryInfo */
/** @var array $treatmentDetails */

// All conditions grouped by category
$groups = [];
foreach ($treatments as $t) {
    $groups[$t['cat']][] = $t;
}
$mainPhone = $site['phones'][0];
$number = 0;
?>
<!-- treatments list -->
<section class="trt-page" aria-label="Conditions we treat">
    <div class="container-90">
        <div class="row g-4 g-xl-5">
            <!-- contents -->
            <aside class="col-lg-3">
                <div class="trt-toc">
                    <label class="trt-jump__label" for="trtJump">Jump to a condition</label>
                    <select class="form-select trt-jump" id="trtJump">
                        <option value="">Choose a condition…</option>
<?php foreach ($groups as $catId => $items): ?>
                        <optgroup label="<?= e($treatmentCategories[$catId]) ?>">
<?php foreach ($items as $t): ?>
                            <option value="<?= e($t['slug']) ?>"><?= e($t['name']) ?></option>
<?php endforeach; ?>
                        </optgroup>
<?php endforeach; ?>
                    </select>

                    <nav class="trt-toc__nav" id="trtToc" aria-label="Conditions">
<?php foreach ($groups as $catId => $items): ?>
                        <a class="nav-link trt-toc__cat" href="#cat-<?= e($catId) ?>"><?= e($treatmentCategories[$catId]) ?> <span><?= count($items) ?></span></a>
                        <nav class="nav flex-column">
<?php foreach ($items as $t): ?>
                            <a class="nav-link trt-toc__link" href="#<?= e($t['slug']) ?>"><?= e($t['name']) ?></a>
<?php endforeach; ?>
                        </nav>
<?php endforeach; ?>
                    </nav>

                    <div class="trt-help">
                        <p><strong>Not sure what you have?</strong> Describe your pain and we'll guide you.</p>
                        <a href="tel:<?= e(tel($mainPhone)) ?>"><?= icon('phone') ?><?= e($mainPhone) ?></a>
                    </div>
                </div>
            </aside>

            <!-- conditions -->
            <div class="col-lg-9">
<?php foreach ($groups as $catId => $items): ?>
<?php $info = $treatmentCategoryInfo[$catId]; ?>
                <div class="trt-group" id="cat-<?= e($catId) ?>" data-cat="<?= e($catId) ?>">
                    <header class="trt-group__head" data-aos="fade-up">
                        <span class="trt-group__icon" aria-hidden="true"><?= icon($info['icon']) ?></span>
                        <div>
                            <span class="trt-group__count"><?= count($items) ?> <?= count($items) === 1 ? 'programme' : 'conditions' ?></span>
                            <h2 class="trt-group__title"><?= e($treatmentCategories[$catId]) ?></h2>
                            <p class="trt-group__text"><?= e($info['text']) ?></p>
                        </div>
                    </header>

<?php foreach ($items as $t): ?>
<?php $detail = $treatmentDetails[$t['slug']]; $number++; ?>
                    <article class="trt-item" id="<?= e($t['slug']) ?>" data-cat="<?= e($catId) ?>" data-aos="fade-up" aria-labelledby="trt-<?= e($t['slug']) ?>">
                        <div class="trt-item__head">
                            <span class="trt-item__icon" aria-hidden="true"><?= icon($t['icon']) ?></span>
                            <div class="trt-item__heading">
                                <span class="trt-item__cat"><?= e($treatmentCategories[$catId]) ?></span>
                                <h3 class="trt-item__title" id="trt-<?= e($t['slug']) ?>"><?= e($t['name']) ?></h3>
                            </div>
                            <span class="trt-item__num" aria-hidden="true"><?= sprintf('%02d', $number) ?></span>
                        </div>

                        <p class="trt-item__overview"><?= e($detail['overview']) ?></p>

                        <div class="trt-item__cols">
                            <div class="trt-item__col">
                                <h4><?= icon('assess') ?><?= e($detail['signs_label'] ?? 'Common signs') ?></h4>
                                <ul class="trt-signs">
<?php foreach ($detail['signs'] as $sign): ?>
                                    <li><?= e($sign) ?></li>
<?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="trt-item__col">
                                <h4><?= icon('hand') ?>How we help</h4>
                                <ul class="trt-care">
<?php foreach ($detail['care'] as $care): ?>
                                    <li><?= e($care) ?></li>
<?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="trt-item__foot">
                            <a class="trt-item__book" href="<?= e(booking_url()) ?>">Book an assessment <?= icon('arrow') ?></a>
                            <a class="trt-item__ask" href="<?= e(whatsapp_link($site['whatsapp'], 'Hi, I would like to know about treatment for ' . $t['name'])) ?>" target="_blank" rel="noopener"><?= icon('whatsapp') ?>Ask on WhatsApp</a>
                        </div>
                    </article>
<?php endforeach; ?>
                </div>
<?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!--/ treatments list -->
