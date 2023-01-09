<?php

use app\models\Assets;


$page = "BERANDA";
?>
<!-- Hero Start -->
<section class="hero-8 bg-center position-relative" style="background-image: url(<?= Assets::get($page, "HERO") ?>);" id="home">
    <div class="bg-overlay"></div>
    <div class="container-fluid" style="position: relative;z-index:999999999">
        <div class="row justify-content-end hero-content">
            <div class="col-md-7">
                <div class="text-left">
                    <img src="<?= Assets::get('COMMON', "LOGO") ?>" alt="" class="img-fluid d-block" style="width:120px">
                    <h1 class="font-weight-semibold mb-4 text-white hero-8-title">
                        <span>
                            AIRPORT
                        </span>
                        <br>
                        MEET & GREET
                    </h1>
                    <p class="mb-5 text-dark-70 w-lg-75">
                        Antrian panjang, pemeriksaan keamanan tanpa akhir, terminal yang berbeda, dan banyak lagi membuat perjalanan bandara Anda penuh stres dan kerepotan. Penerbangan kedatangan, keberangkatan, dan transit Anda menjadi semakin sulit di sebagian besar bandara internasional di seluruh dunia.
                    </p>
                    <p style="color: #006B3D" class="font-weight-semibold">
                        Tapi SBA Meet & Greet menawarkan solusinya!
                    </p>
                    <a href="<?= \yii\helpers\Url::to(['guest/booking']) ?>" class="btn btn-light">BOOK NOW <i class="icon-sm ms-1" data-feather="arrow-right"></i></a>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div>
    <div class="hero-8-shape">
        <img src="<?= Assets::get($page, "HERO_SHAPE") ?>" alt="" class="img-fluid mx-auto d-block">
    </div>
</section>
<!-- Hero End -->

<!-- Services start -->
<section class="section" id="services">
    <div class="container">
        <!-- <div class="row justify-content-center mb-5">
            <div class="col-lg-7 text-center">
                <h2 class="fw-bold">Our Services</h2>
                <p class="text-muted">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem ab illo inventore.</p>
            </div>
        </div> -->
        <!-- end row -->
        <div class="row">
            <?php foreach ($services as $service) : ?>
                <div class="col-lg-4 mb-5">
                    <div class="service__item">
                        <div class="service__item_image" style="background-image: url(<?= $service->image ?>);"></div>
                        <div class="service__item_content">
                            <div class="text-start">
                                <h5 class="service-title"><?= $service->title ?></h5>
                                <p class="service-text text-muted"><?= $service->description ?></p>
                            </div>
                            <div class="text-end">
                                <a href="<?= \yii\helpers\Url::to(['guest/service']) ?>" class="service-btn"><i class="icon-sm ms-1" data-feather="arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            <?php endforeach; ?>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->

</section>
<!-- Services end -->


<section class="section bg-gradient-primary">
    <div class="bg-overlay-img" style="background-image: url(<?= Assets::get($page, 'OFFER') ?>); background-size: cover; box-shadow: inset 0 0 0 2000px rgba(0, 107, 61, 0.8);background-attachment: fixed;"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4">
                <h1 class="text-white mb-4 text-end cra-title">
                    What We Offer
                </h1>
            </div>
            <div class="col-md-8">
                <div class="text-left">
                    <p class="text-white mb-5 font-size-16">
                        Penyediaan tambahan Jasa Layanan Penumpang dan Bagasi dalam memberikan kemudahan, kenyamanan dan pengalaman yang berkesan selama keberangkatan dan kedatangan maupun pada saat transfer di Airport.

                    </p>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- Cta end -->


<!-- Whywe start -->
<section class="section bg-light" id="whywe">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7 text-center">
                <h2 class="fw-bold">Mengapa SBA Airport Meet & Greet?</h2>
            </div>
            <!-- end col -->
        </div>
        <div class="row align-items-start mb-5 justify-content-center">
            <?php foreach ($whywes as $whywe) : ?>
                <div class="col-lg-3 col-sm-6 col-md-4 mb-2">
                    <div class="whywe__item">
                        <div class="mb-5">
                            <img src="<?= $whywe->icon ?>" alt="" class="img-fluid d-block mx-auto" style="height: 120px">
                        </div>
                        <div class="whywe__item_content align-items-start">
                            <div class="text-start mb-3">
                                <h5 class="whywe-title"><?= $whywe->title ?></h5>
                                <p class="whywe-text text-muted"><?= $whywe->description ?></p>
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
<!-- Whywe end -->