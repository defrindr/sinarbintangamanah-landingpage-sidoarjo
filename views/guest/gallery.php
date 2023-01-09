<?php

use app\models\Assets;
use richardfan\widget\JSRegister;

$page = "GALLERY";
?>
<!-- Hero Start -->
<section class="hero-8 minimalhero bg-center position-relative" style="background-image: url(<?= Assets::get($page, "HERO") ?>);" id="home">
    <div class="container">
        <div class="row justify-content-start hero-content">
            <div class="col-md-5">
                <div class="text-left">
                    <h1 class="font-weight-semibold mb-4 text-white hero-8-title">
                        <span>
                            GALLERY
                        </span>
                    </h1>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div>
</section>
<!-- Hero End -->

<div class="modal__gallery">
    <div class="modal__gallery__content__close">
        <i class="icon-sm" data-feather="x"></i>
    </div>
    <div class="modal__gallery__content">
        <div class="modal__gallery__content__image">
            <img src="https://static.wixstatic.com/media/eaac09_10c82e7015014c5ca0f6a93a812fafcb~mv2.jpeg/v1/fit/w_687,h_576,q_90/eaac09_10c82e7015014c5ca0f6a93a812fafcb~mv2.jpeg" alt="" class="img-fluid" id="modal__gallery__content__image__img">
        </div>
        <div class="modal__gallery__content__caption">
            <h3 class="modal__gallery__content__caption__title" id="modal__gallery__content__caption__title">
            </h3>
        </div>
    </div>
</div>

<section class="section" id="services_service">
    <div class="container">
        <div class="row mb-5">
            <?php foreach ($galleries as $photo) : ?>
                <div class="col-lg-4">
                    <div class="gallery__item">
                        <div class="gallery__bg-overlay"></div>
                        <img src="<?= $photo->imageUrl ?>" class="img-fluid d-block mx-auto" alt="<?= $photo->caption ?>">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>



<?php JSRegister::begin(); ?>
<script>
    $(document).ready(function() {
        $('.gallery__item').click(function() {
            console.log('clicked');
            $('.modal__gallery').addClass('active');
            let img = $(this).find('img').attr('src');
            let title = $(this).find('img').attr('alt');
            $('#modal__gallery__content__image__img').attr('src', img);
            $('#modal__gallery__content__caption__title').text(title);
        });

        $('.modal__gallery__content__close').click(function() {
            $('.modal__gallery').removeClass('active');
        });
    });
</script>
<?php JSRegister::end(); ?>