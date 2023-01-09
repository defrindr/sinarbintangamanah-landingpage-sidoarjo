<?php

use app\models\Assets;
use app\models\Testimoni;

$testimonials = Testimoni::find()->andWhere([
    'show' => 1
])->orderBy('id DESC')->all();
?>
<!-- Testimoni start -->
<section class="section bg-testimoni" id="whywe">
    <div class="bg-overlay-img" style="background-image: url(<?= Assets::get('COMMON', 'TESTIMONI') ?>);background-position: center;background-size: auto;opacity: 0.2;background-repeat: no-repeat;"></div>
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7 text-center">
                <h2 class="fw-bold text-white">Testimoni</h2>
            </div>
            <!-- end col -->
        </div>
        <div class="row align-items-start mb-5 justify-content-center">
            <?php foreach ($testimonials as $item) : ?>
                <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
                    <div class="testimoni__item">
                        <div class="mb-2">
                            <span class="testimoni__item_icon"><i class="fas fa-quote-left"></i></span>
                        </div>
                        <div class="testimoni__item_content align-items-start">
                            <div class="text-start mb-3">
                                <h5 class="testimoni-title"><?= $item->name ?></h5>
                                <p class="testimoni-text"><?= $item->text ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            <?php endforeach; ?>
        </div>
    </div>
    <!-- end container -->
</section>
<!-- Testimoni end -->