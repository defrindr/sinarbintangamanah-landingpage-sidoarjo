<?php

use app\models\Assets;
use richardfan\widget\JSRegister;

$page = "ABOUT";
?>

<style>
    #map {
        width: 100%;
        height: 500px;
        overflow: hidden;
    }
</style>
<!-- Hero Start -->
<section class="hero-8 bg-center position-relative" style="background-image: url(<?= Assets::get($page, "HERO") ?>);" id="home">
    <div class="container">
        <div class="row justify-content-start hero-content">
            <div class="col-md-5">
                <div class="text-left d-flex flex-row justify-content-center">
                    <h1 class="font-weight-semibold text-white hero-8-title">
                        ABOUT
                    </h1>
                    <img src="<?= Assets::get('COMMON', 'LOGO') ?>" alt="" class="img-fluid" style="height: 125px;transform: translateY(-25px);">
                </div>
                <p>
                    Penyediaan tambahan Jasa Layanan Penumpang dan Bagasi dalam memberikan kemudahan, kenyamanan dan pengalaman yang berkesan selama keberangkatan dan kedatangan maupun pada saat transfer di Airport.
                </p>
            </div><!-- end col -->
        </div><!-- end row -->
    </div>
</section>
<!-- Hero End -->

<!-- ABOUT START -->
<section class="section" id="about">
    <div class="container">
        <div class="row pt-4 mb-5">
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="about__icon">
                        <svg preserveAspectRatio="xMidYMid meet" data-bbox="20 55.5 160 89" viewBox="20 55.5 160 89" height="200" width="200" xmlns="http://www.w3.org/2000/svg" data-type="color" role="presentation" aria-hidden="true">
                            <defs>
                                <style>
                                    #comp-lbgsqsvm svg [data-color="1"] {
                                        fill: #F89820;
                                    }
                                </style>
                            </defs>
                            <g>
                                <path d="M100 144.5c-34.674 0-56.149-11.44-79.236-42.208a3.818 3.818 0 0 1 0-4.583C43.851 66.94 65.326 55.5 100 55.5c34.674 0 56.15 11.44 79.236 42.209a3.815 3.815 0 0 1 0 4.581C156.15 133.06 134.674 144.5 100 144.5zM28.599 100c20.99 27.168 39.96 36.871 71.401 36.871 31.441 0 50.412-9.704 71.401-36.871-20.989-27.168-39.96-36.871-71.401-36.871-31.44 0-50.411 9.703-71.401 36.871z" data-color="1"></path>
                                <path d="M100 144.5c-24.507 0-44.444-19.962-44.444-44.5S75.493 55.5 100 55.5s44.444 19.962 44.444 44.5-19.937 44.5-44.444 44.5zm0-81.371c-20.305 0-36.825 16.54-36.825 36.871s16.52 36.871 36.825 36.871 36.825-16.54 36.825-36.871S120.305 63.129 100 63.129z" data-color="1"></path>
                                <path d="M100 119.071c-10.503 0-19.048-8.555-19.048-19.071S89.497 80.929 100 80.929s19.048 8.555 19.048 19.071-8.545 19.071-19.048 19.071zm0-30.514c-6.302 0-11.429 5.133-11.429 11.443s5.127 11.443 11.429 11.443 11.429-5.133 11.429-11.443S106.302 88.557 100 88.557z" data-color="1"></path>
                            </g>
                        </svg>
                    </div>
                    <h2 class="mb-4">VISI</h2>
                    <p class="text-muted mb-4">
                        <?= Assets::text($page, "VISI") ?>
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about__content">
                    <div class="about__icon">
                        <svg preserveAspectRatio="xMidYMid meet" data-bbox="29.5 29.5 141 141" viewBox="29.5 29.5 141 141" height="200" width="200" xmlns="http://www.w3.org/2000/svg" data-type="color" role="presentation" aria-hidden="true" aria-labelledby="svgcid-8bxh0q-vm2avg">
                            <defs>
                                <style>
                                    #comp-lbgsr5wt3 svg [data-color="1"] {
                                        fill: #F89820;
                                    }
                                </style>
                            </defs>
                            <title id="svgcid-8bxh0q-vm2avg"></title>
                            <g>
                                <path d="M100 29.5c-38.874 0-70.5 31.626-70.5 70.5s31.626 70.5 70.5 70.5 70.5-31.626 70.5-70.5-31.626-70.5-70.5-70.5zm4 132.858V139.9a4 4 0 0 0-8 0v22.458C64.72 160.371 39.629 135.28 37.642 104H60.1a4 4 0 0 0 0-8H37.642C39.629 64.72 64.72 39.629 96 37.642V60.1a4 4 0 0 0 8 0V37.642C135.28 39.629 160.371 64.72 162.358 96H139.9a4 4 0 0 0 0 8h22.458c-1.987 31.28-27.078 56.371-58.358 58.358z" data-color="1"></path>
                            </g>
                        </svg>
                    </div>
                    <h2 class="mb-4">MISI</h2>
                    <p class="text-muted mb-4">
                        <?= Assets::text($page, "VISI") ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section" id="map">
    <div id="map"></div>
</section>

<!-- ABOUT END -->

<!-- -7.3745049!4d112.7559955 -->

<?php JSRegister::begin() ?>
<script>
    var map = L.map('map').setView([112.7559955,-7.3745049], 13);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    L.marker([112.7559955, -7.3745049]).addTo(map)
        .bindPopup(
            // open in google maps
            '<a href="https://www.google.com/maps/search/?api=1&query=-7.3745049,112.7559955" target="_blank">Lokasi Kami</a>'
        )
        .openPopup();
</script>

<?php JSRegister::end() ?>