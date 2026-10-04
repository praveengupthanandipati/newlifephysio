<?php
/**
 * Why Choose Us page: our care promise. Photo + numbered commitments from
 * $whyPage['promise'].
 */

// Provided by data.php via init.php (declared for the editor)
/** @var array $whyPage */

$promise = $whyPage['promise'];
?>
<!-- care promise -->
<section class="care-promise" id="promise" aria-labelledby="promiseTitle">
    <div class="container-90">
        <div class="row align-items-center g-5">
            <!-- media -->
            <div class="col-lg-5">
                <div class="promise-media">
                    <figure class="promise-media__img" data-aos="reveal">
                        <img src="img/<?= e($promise['image']) ?>-1024.jpg" srcset="img/<?= e($promise['image']) ?>-1024.jpg 1024w, img/<?= e($promise['image']) ?>.jpg 1920w" sizes="(min-width: 992px) 38vw, 90vw" alt="Physiotherapist supporting a patient during sling suspension therapy" loading="lazy">
                    </figure>
                    <div class="promise-badge" data-aos="fade-up" data-aos-delay="300">
                        <span class="promise-badge__icon" aria-hidden="true"><?= icon('heart') ?></span>
                        <span>
                            <strong><?= e($promise['badge']['title']) ?></strong>
                            <small><?= e($promise['badge']['text']) ?></small>
                        </span>
                    </div>
                </div>
            </div>

            <!-- commitments -->
            <div class="col-lg-7">
                <span class="promise-eyebrow" data-aos="fade-up"><?= e($promise['eyebrow']) ?></span>
                <h2 class="promise-title" id="promiseTitle" data-aos="fade-up" data-aos-delay="80"><?= e($promise['title']) ?> <span><?= e($promise['highlight']) ?></span></h2>
                <p class="promise-lead" data-aos="fade-up" data-aos-delay="160"><?= e($promise['lead']) ?></p>

                <ol class="promise-list">
<?php foreach ($promise['items'] as $i => $item): ?>
                    <li class="promise-item" data-aos="fade-up" data-aos-delay="<?= 200 + $i * 80 ?>">
                        <span class="promise-item__num" aria-hidden="true"><?= sprintf('%02d', $i + 1) ?></span>
                        <div>
                            <h3><?= e($item['title']) ?></h3>
                            <p><?= e($item['text']) ?></p>
                        </div>
                    </li>
<?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>
</section>
<!--/ care promise -->
