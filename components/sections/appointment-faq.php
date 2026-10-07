<?php
/**
 * Free appointment page: booking FAQs (Bootstrap accordion, FAQ page styles).
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $appointmentPage */

$faq = $appointmentPage['faq'];
?>
<!-- booking faq -->
<section class="sp-faq" id="faq" aria-labelledby="apFaqTitle">
    <div class="container-90">
        <div class="svc-head" data-aos="fade-up">
            <span class="svc-eyebrow"><?= e($faq['eyebrow']) ?></span>
            <h2 class="svc-title" id="apFaqTitle"><?= e($faq['title']) ?> <span><?= e($faq['highlight']) ?></span></h2>
        </div>

        <div class="accordion faq-acc sp-faq__list" id="apFaqList">
<?php foreach ($faq['items'] as $i => $item): ?>
<?php $id = 'ap-faq-' . ($i + 1); $open = $i === 0; ?>
            <div class="accordion-item faq-item" data-aos="fade-up">
                <h3 class="accordion-header">
                    <button class="accordion-button<?= $open ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $id ?>" aria-expanded="<?= $open ? 'true' : 'false' ?>" aria-controls="<?= $id ?>">
                        <span class="faq-item__num" aria-hidden="true"><?= sprintf('%02d', $i + 1) ?></span>
                        <span class="faq-item__q"><?= e($item['q']) ?></span>
                    </button>
                </h3>
                <div id="<?= $id ?>" class="accordion-collapse collapse<?= $open ? ' show' : '' ?>" data-bs-parent="#apFaqList">
                    <div class="accordion-body">
                        <p><?= e($item['a']) ?></p>
                    </div>
                </div>
            </div>
<?php endforeach; ?>
        </div>

        <p class="sp-faq__more" data-aos="fade-up">More questions? <a href="faq.php">See all FAQs <?= icon('arrow') ?></a></p>
    </div>
</section>
<!--/ booking faq -->
