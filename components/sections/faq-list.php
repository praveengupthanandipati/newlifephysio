<?php
/**
 * FAQ page: search + category filters, and the questions as one Bootstrap
 * accordion (one answer open at a time), grouped by category.
 * Every question has a shareable anchor (#faq-<slug>); js/custom.js opens it
 * when the page is loaded with that hash, and handles search / filters.
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $site */
/** @var array $faqPage */

$categories = $faqPage['categories'];
$groups = [];
foreach ($faqPage['items'] as $item) {
    $groups[$item['cat']][] = $item;
}
$mainPhone = $site['phones'][0];
$number = 0;
?>
<!-- faq -->
<section class="faq-page" aria-label="Frequently asked questions">
    <div class="container-90">
        <div class="row g-4 g-xl-5">
            <!-- search, filters, help -->
            <aside class="col-lg-4">
                <div class="faq-side">
                    <div class="faq-search" data-aos="fade-up">
                        <label class="visually-hidden" for="faqSearch">Search questions</label>
                        <svg class="faq-search__icon" viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="M20 20l-3.5-3.5"/></svg>
                        <input class="form-control" type="search" id="faqSearch" placeholder="Search questions…" autocomplete="off">
                    </div>

                    <div class="faq-filters" role="group" aria-label="Filter questions by topic" data-aos="fade-up" data-aos-delay="80">
                        <button class="faq-filter is-active" type="button" data-filter="all" aria-pressed="true">All <span><?= count($faqPage['items']) ?></span></button>
<?php foreach ($categories as $catId => $cat): ?>
<?php if (empty($groups[$catId])) continue; ?>
                        <button class="faq-filter" type="button" data-filter="<?= e($catId) ?>" aria-pressed="false"><?= e($cat['label']) ?> <span><?= count($groups[$catId]) ?></span></button>
<?php endforeach; ?>
                    </div>

                    <div class="faq-help" data-aos="fade-up" data-aos-delay="160">
                        <span class="faq-help__icon" aria-hidden="true"><?= icon('heart') ?></span>
                        <h2>Still have questions?</h2>
                        <p>Talk to us directly — we're happy to help you decide if physiotherapy is right for you.</p>
                        <a class="faq-help__btn faq-help__btn--call" href="tel:<?= e(tel($mainPhone)) ?>"><?= icon('phone') ?><?= e($mainPhone) ?></a>
                        <a class="faq-help__btn faq-help__btn--wa" href="<?= e(whatsapp_link($site['whatsapp'], 'Hi, I have a question about physiotherapy')) ?>" target="_blank" rel="noopener"><?= icon('whatsapp') ?>Ask on WhatsApp</a>
                    </div>
                </div>
            </aside>

            <!-- questions -->
            <div class="col-lg-8">
                <div class="faq-list" id="faqList">
<?php foreach ($categories as $catId => $cat): ?>
<?php if (empty($groups[$catId])) continue; ?>
                    <div class="faq-group" data-cat="<?= e($catId) ?>" id="faq-cat-<?= e($catId) ?>">
                        <h2 class="faq-group__title" data-aos="fade-up">
                            <span class="faq-group__icon" aria-hidden="true"><?= icon($cat['icon']) ?></span>
                            <?= e($cat['label']) ?>
                        </h2>
                        <div class="accordion faq-acc">
<?php foreach ($groups[$catId] as $item): ?>
<?php
    $number++;
    $id = 'faq-' . slugify($item['q']);
    $open = $number === 1; // first question starts open
?>
                            <div class="accordion-item faq-item" id="<?= e($id) ?>" data-aos="fade-up">
                                <h3 class="accordion-header">
                                    <button class="accordion-button<?= $open ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?= e($id) ?>-a" aria-expanded="<?= $open ? 'true' : 'false' ?>" aria-controls="<?= e($id) ?>-a">
                                        <span class="faq-item__num" aria-hidden="true"><?= sprintf('%02d', $number) ?></span>
                                        <span class="faq-item__q"><?= e($item['q']) ?></span>
                                    </button>
                                </h3>
                                <div id="<?= e($id) ?>-a" class="accordion-collapse collapse<?= $open ? ' show' : '' ?>" data-bs-parent="#faqList">
                                    <div class="accordion-body">
                                        <p><?= e($item['a']) ?></p>
<?php if (!empty($item['link'])): ?>
                                        <a class="faq-item__link" href="<?= e($item['link']['url']) ?>"><?= e($item['link']['label']) ?> <?= icon('arrow') ?></a>
<?php endif; ?>
                                    </div>
                                </div>
                            </div>
<?php endforeach; ?>
                        </div>
                    </div>
<?php endforeach; ?>

                    <div class="faq-empty" id="faqEmpty" hidden>
                        <span class="faq-empty__icon" aria-hidden="true"><?= icon('assess') ?></span>
                        <h3>No questions match your search</h3>
                        <p>Try different words, or ask us directly — we reply quickly on WhatsApp.</p>
                        <a class="faq-help__btn faq-help__btn--wa" href="<?= e(whatsapp_link($site['whatsapp'], 'Hi, I have a question about physiotherapy')) ?>" target="_blank" rel="noopener"><?= icon('whatsapp') ?>Ask on WhatsApp</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ faq -->
