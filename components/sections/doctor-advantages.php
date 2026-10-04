<?php
/**
 * Doctor page: advantages of treating with the doctor + booking card.
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $site */
/** @var array $doctorPage */

$adv = $doctorPage['advantages'];
$mainPhone = $site['phones'][0];
?>
<!-- doctor advantages -->
<section class="doc-adv" id="advantages" aria-labelledby="docAdvTitle">
    <div class="container-90">
        <div class="row g-5">
            <div class="col-lg-8">
                <div class="doc-adv__head" data-aos="fade-up">
                    <span class="doc-adv__eyebrow"><?= e($adv['eyebrow']) ?></span>
                    <h2 class="doc-adv__title" id="docAdvTitle"><?= e($adv['title']) ?> <span><?= e($adv['highlight']) ?></span></h2>
                </div>

                <ul class="doc-adv__list">
<?php foreach ($adv['points'] as $i => $point): ?>
                    <li class="doc-adv__item" data-aos="fade-up" data-aos-delay="<?= ($i % 2) * 120 ?>">
                        <span class="doc-adv__icon" aria-hidden="true"><?= icon($point['icon']) ?></span>
                        <div>
                            <h3><?= e($point['title']) ?></h3>
                            <p><?= e($point['text']) ?></p>
                        </div>
                    </li>
<?php endforeach; ?>
                </ul>
            </div>

            <!-- booking card -->
            <div class="col-lg-4">
                <aside class="doc-book" data-aos="fade-left" aria-label="Book an appointment">
                    <span class="doc-book__icon" aria-hidden="true"><?= icon('calendar') ?></span>
                    <h3>Book a Session with <?= e($site['doctor']['name']) ?></h3>
                    <p>Tell us what's troubling you and we'll find a time that suits you.</p>

                    <ul class="doc-book__hours">
<?php foreach ($site['hours'] as $group): ?>
                        <li><span><?= e($group['label']) ?></span><b><?= e(format_slots($group['slots'])) ?></b></li>
<?php endforeach; ?>
                    </ul>

                    <a class="doc-book__btn doc-book__btn--primary" href="<?= e(anchor('appointment')) ?>">Book Free Consultation <?= icon('arrow') ?></a>
                    <a class="doc-book__btn doc-book__btn--call" href="tel:<?= e(tel($mainPhone)) ?>"><?= icon('phone') ?><?= e($mainPhone) ?></a>
                </aside>
            </div>
        </div>
    </div>
</section>
<!--/ doctor advantages -->
