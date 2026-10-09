<?php
/**
 * Patient Resources page: intro cards, then three sections linked from the
 * "Patient Resources" menu — #guidance (everyday tips + red flags),
 * #rehabilitation (stages, typical recovery times, exercise-pain guide,
 * tips and first-visit checklist) and #faq (accordion, FAQPage schema).
 * All content from $resourcesPage.
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $site */
/** @var array $resourcesPage */

$rs = $resourcesPage;
$g = $rs['guidance'];
$r = $rs['rehab'];
$faq = $rs['faq'];
?>
<!-- intro -->
<section class="rs-intro" aria-labelledby="rsIntroTitle">
    <div class="container-90">
        <div class="svc-head" data-aos="fade-up">
            <span class="svc-eyebrow"><?= e($rs['intro']['eyebrow']) ?></span>
            <h2 class="svc-title" id="rsIntroTitle"><?= e($rs['intro']['title']) ?> <span><?= e($rs['intro']['highlight']) ?></span></h2>
            <p class="svc-lead"><?= e($rs['intro']['lead']) ?></p>
        </div>
        <ul class="rs-cards">
<?php foreach ($rs['intro']['cards'] as $i => $card): ?>
            <li data-aos="fade-up" data-aos-delay="<?= $i * 100 ?>">
                <a class="rs-card" href="#<?= e($card['anchor']) ?>">
                    <span class="rs-card__icon" aria-hidden="true"><?= icon($card['icon']) ?></span>
                    <strong><?= e($card['title']) ?></strong>
                    <span class="rs-card__text"><?= e($card['text']) ?></span>
                    <span class="rs-card__more">Read more <?= icon('arrow') ?></span>
                </a>
            </li>
<?php endforeach; ?>
        </ul>
    </div>
</section>
<!--/ intro -->

<!-- basic physiotherapy guidance -->
<section class="rs-guidance" id="guidance" aria-labelledby="rsGuidanceTitle">
    <div class="container-90">
        <div class="svc-head" data-aos="fade-up">
            <span class="svc-eyebrow"><?= e($g['eyebrow']) ?></span>
            <h2 class="svc-title" id="rsGuidanceTitle"><?= e($g['title']) ?> <span><?= e($g['highlight']) ?></span></h2>
            <p class="svc-lead"><?= e($g['lead']) ?></p>
        </div>

        <div class="rs-tips">
<?php foreach ($g['items'] as $i => $item): ?>
            <article class="rs-tip" data-aos="fade-up" data-aos-delay="<?= ($i % 4) * 80 ?>">
                <span class="rs-tip__icon" aria-hidden="true"><?= icon($item['icon']) ?></span>
                <h3><?= e($item['title']) ?></h3>
                <ul>
<?php foreach ($item['tips'] as $tip): ?>
                    <li><?= e($tip) ?></li>
<?php endforeach; ?>
                </ul>
            </article>
<?php endforeach; ?>
        </div>

        <aside class="rs-warning" data-aos="fade-up" aria-labelledby="rsWarnTitle">
            <span class="rs-warning__icon" aria-hidden="true"><?= icon('alert') ?></span>
            <div>
                <h3 id="rsWarnTitle"><?= e($g['warning']['title']) ?></h3>
                <p><?= e($g['warning']['text']) ?></p>
                <ul>
<?php foreach ($g['warning']['items'] as $item): ?>
                    <li><?= e($item) ?></li>
<?php endforeach; ?>
                </ul>
            </div>
        </aside>
        <p class="rs-note"><?= icon('shield') ?><?= e($g['note']) ?></p>
    </div>
</section>
<!--/ basic physiotherapy guidance -->

<!-- rehabilitation information -->
<section class="rs-rehab" id="rehabilitation" aria-labelledby="rsRehabTitle">
    <div class="container-90">
        <div class="svc-head" data-aos="fade-up">
            <span class="svc-eyebrow"><?= e($r['eyebrow']) ?></span>
            <h2 class="svc-title" id="rsRehabTitle"><?= e($r['title']) ?> <span><?= e($r['highlight']) ?></span></h2>
            <p class="svc-lead"><?= e($r['lead']) ?></p>
        </div>

        <ol class="rs-stages">
<?php foreach ($r['stages'] as $i => $stage): ?>
            <li class="rs-stage" data-aos="fade-up" data-aos-delay="<?= $i * 100 ?>">
                <span class="rs-stage__num" aria-hidden="true"><?= $i + 1 ?></span>
                <span class="rs-stage__icon" aria-hidden="true"><?= icon($stage['icon']) ?></span>
                <h3>Stage <?= $i + 1 ?>: <?= e($stage['title']) ?></h3>
                <p><?= e($stage['text']) ?></p>
            </li>
<?php endforeach; ?>
        </ol>

        <div class="row g-4 g-xl-5 rs-rehab__row">
            <div class="col-lg-7" data-aos="fade-up">
                <div class="rs-panel">
                    <h3><?= icon('calendar') ?><?= e($r['timeline_title']) ?></h3>
                    <dl class="rs-times">
<?php foreach ($r['timeline'] as $row): ?>
                        <div>
                            <dt><?= e($row['label']) ?></dt>
                            <dd><?= e($row['time']) ?></dd>
                        </div>
<?php endforeach; ?>
                    </dl>
                    <p class="rs-panel__note"><?= e($r['timeline_note']) ?></p>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-up" data-aos-delay="120">
                <div class="rs-panel rs-pain">
                    <h3><?= icon('bolt') ?><?= e($r['pain']['title']) ?></h3>
                    <p><?= e($r['pain']['text']) ?></p>
                    <ul>
<?php foreach ($r['pain']['levels'] as $level): ?>
                        <li class="rs-pain__level rs-pain__level--<?= e($level['level']) ?>">
                            <span class="rs-pain__range"><?= e($level['range']) ?></span>
                            <span><strong><?= e($level['label']) ?></strong><small><?= e($level['text']) ?></small></span>
                        </li>
<?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="col-md-6" data-aos="fade-up">
                <div class="rs-panel rs-check">
                    <h3><?= icon('target') ?><?= e($r['tips_title']) ?></h3>
                    <ul>
<?php foreach ($r['tips'] as $tip): ?>
                        <li><?= icon('shield') ?><?= e($tip) ?></li>
<?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="120">
                <div class="rs-panel rs-check">
                    <h3><?= icon('clipboard-plus') ?><?= e($r['bring_title']) ?></h3>
                    <ul>
<?php foreach ($r['bring'] as $item): ?>
                        <li><?= icon('shield') ?><?= e($item) ?></li>
<?php endforeach; ?>
                    </ul>
                    <a class="rs-panel__link" href="free-appointment.php">Book your first visit <?= icon('arrow') ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ rehabilitation information -->

<!-- faq -->
<section class="sp-faq" id="faq" aria-labelledby="rsFaqTitle">
    <div class="container-90">
        <div class="svc-head" data-aos="fade-up">
            <span class="svc-eyebrow"><?= e($faq['eyebrow']) ?></span>
            <h2 class="svc-title" id="rsFaqTitle"><?= e($faq['title']) ?> <span><?= e($faq['highlight']) ?></span></h2>
        </div>

        <div class="accordion faq-acc sp-faq__list" id="rsFaqList">
<?php foreach ($faq['items'] as $i => $item): ?>
<?php $id = 'rs-faq-' . ($i + 1); $open = $i === 0; ?>
            <div class="accordion-item faq-item" data-aos="fade-up">
                <h3 class="accordion-header">
                    <button class="accordion-button<?= $open ? '' : ' collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $id ?>" aria-expanded="<?= $open ? 'true' : 'false' ?>" aria-controls="<?= $id ?>">
                        <span class="faq-item__num" aria-hidden="true"><?= sprintf('%02d', $i + 1) ?></span>
                        <span class="faq-item__q"><?= e($item['q']) ?></span>
                    </button>
                </h3>
                <div id="<?= $id ?>" class="accordion-collapse collapse<?= $open ? ' show' : '' ?>" data-bs-parent="#rsFaqList">
                    <div class="accordion-body">
                        <p><?= e($item['a']) ?></p>
                    </div>
                </div>
            </div>
<?php endforeach; ?>
        </div>

        <p class="sp-faq__more" data-aos="fade-up">Questions about appointments, fees or visits? <a href="faq.php">See all FAQs <?= icon('arrow') ?></a></p>
    </div>
</section>
<!--/ faq -->
