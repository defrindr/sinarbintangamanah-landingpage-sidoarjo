<?php

use app\models\Assets;
use richardfan\widget\JSRegister;

$page = "SERVICE";
?>
<!-- Hero Start -->
<section class="hero-8 bg-center position-relative" style="background-image: url(<?= Assets::get($page, "HERO") ?>);" id="home">
    <div class="container">
        <div class="row justify-content-start hero-content">
            <div class="col-md-5">
                <div class="text-left">
                    <h1 class="font-weight-semibold mb-4 text-white hero-8-title">
                        <span>
                            OUR
                        </span>
                        <br>
                        SERVICE
                    </h1>
                    <p class="mb-5 text-white w-lg-75">
                        <?= Assets::text($page, "HERO_TEXT") ?>
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


<section class="section" id="services_service">
    <div class="container">
        <div class="row mb-5">
            <?php foreach ($services as $service) : ?>
                <div class="col-md-4 mb-3">
                    <div class="service_box-pilihan 
                <?= $service->id == 1 ? 'active' : '' ?>
                " 
                id="pilihanservice<?= $service->id ?>"
                onclick="activeServiceElement(<?= $service->id ?>)">
                        <img src="<?= $service->image ?>" alt="" class="img-fluid">
                        <div class="layer-black"></div>
                        <span class="title">
                            <?= $service->title ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="service__element" id="myservice1">

            <div class="row">
                <div class="col-md-12 mb-4">
                    <h2 class="service__title mb-4">SBA Airport Meet & Greet</h2>
                    <p class="service__info mb-2"> Apakah Anda sering terbang? Atau pertama kali?
                        <br>
                        Apakah Anda seorang yang busines traveler atau explorer? Apakah Anda seorang travelling for the time?
                    </p>
                    <p class="service__description">
                        Baik Anda bepergian sendiri atau dengan grup besar, dengan maskapai apa pun, untuk tujuan manapun, kami siap membantu Anda karena kami memahami betapa melelahkan dan rumitnya prosedur bandara, bahkan untuk travelers veteran. Di SBA, setiap traveler unik bagi kami, dan tujuan kami adalah menawarkan pengalaman perjalanan yang mudah dan bebas stres kepada mereka. Dengan layanan SBA Meet and Greet, kami memastikan pengalaman yang tak terlupakan dan menyenangkan bagi traveler udara di seluruh dunia.
                    </p>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-4">
                    <img src="https://static.wixstatic.com/media/eaac09_80b447da4af048cda13ee8235ccce6fd~mv2.jpg/v1/crop/x_0,y_602,w_7008,h_3901/fill/w_640,h_356,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/shutterstock_2229490699.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <img src="https://static.wixstatic.com/media/eaac09_d363ea0da9494916add46ae7b0dce6b0~mv2.jpg/v1/crop/x_0,y_898,w_8192,h_4566/fill/w_640,h_356,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/shutterstock_2147058531.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <img src="https://static.wixstatic.com/media/eaac09_fcfb302cd7a747b08d5c27397ef3eda3~mv2.jpg/v1/crop/x_0,y_24,w_7509,h_4177/fill/w_640,h_356,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/shutterstock_2003176346.jpg" alt="" class="img-fluid">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12">
                    <table class="w-100 service__table">
                        <tr class="pb-4">
                            <td class="text-end service__item-col mb-4" width="45%">
                                <div class="service__item-icon left">
                                    <svg preserveAspectRatio="xMidYMid meet" data-bbox="-0.001 0 162.821 106.341" viewBox="-0.001 0 162.821 106.341" xmlns="http://www.w3.org/2000/svg" data-type="color" role="presentation" aria-hidden="true" aria-labelledby="svgcid--r12575-6vn9mr">
                                        <defs>
                                            <style>
                                                #comp-lbgloxrf svg [data-color="1"] {
                                                    fill: #BADA55;
                                                }
                                            </style>
                                        </defs>
                                        <title id="svgcid--r12575-6vn9mr"></title>
                                        <g>
                                            <path d="m161.32 5.71-16 5.86-6.09 27.9-47.4 17.24L104.89 0 81.71 8.46 44.39 74 8.29 87.14c-6.15 2.24-9.64 8.16-7.8 13.23s8.33 7.35 14.48 5.11L134.28 62l28.54-10.36Z" data-color="1"></path>
                                        </g>
                                    </svg>
                                </div>
                                <span class="service__item-title">
                                    Arrival
                                </span>
                            </td>
                            <td width="10%"></td>
                            <td class="text-start service__item-col mb-4" width="45%">
                                <div class="service__item-icon right">
                                    <svg preserveAspectRatio="xMidYMid meet" data-bbox="0 0 181.435 87.92" viewBox="0 0 181.435 87.92" xmlns="http://www.w3.org/2000/svg" data-type="color" role="presentation" aria-hidden="true" aria-labelledby="svgcid--bkccnw-smdpbq">
                                        <defs>
                                            <style>
                                                #comp-lbgluhka svg [data-color="1"] {
                                                    fill: #BADA55;
                                                }
                                            </style>
                                        </defs>
                                        <title id="svgcid--bkccnw-smdpbq"></title>
                                        <g>
                                            <path d="m0 54.35 15.48-7.19 24 15.42 45.72-21.3-49.33-30.87L58.24 0 131 20l34.79-16.27c5.93-2.77 12.58-1.06 14.87 3.83S180 18.65 174 21.42L59 75.06 31.44 87.92Z" data-color="1"></path>
                                        </g>
                                    </svg>
                                </div>
                                <span class="service__item-title">
                                    Departure
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end pt-3 pb-5">
                                Dengan kedatangan SBA Airport Meet and Greet, kami menghilangkan stres dari perjalanan Anda dan menawarkan perjalanan yang mulus melalui bandara dengan beberapa langkah.
                            </td>
                            <td></td>
                            <td class="text-start pt-3 pb-5">
                                Untuk penerbangan Anda berikutnya, izinkan kami menawarkan perjalanan yang mulus dari saat Anda tiba di bandara hingga Anda berangkat, melalui beberapa langkah mudah ini.
                            </td>
                        </tr>
                        <tr>
                            <td class="text-end pt-3 pb-3 sertice_text_dark">
                                SBA Airport Meet and Greet akan menyambut Anda dengan ramah dan diinformasikan setiap saat tentang waktu kedatangan dan nomor gerbang penerbangan.
                            </td>
                            <td class="text-center">
                                <div class="btn btn-services_service">
                                    STEP 1
                                </div>
                            </td>
                            <td class="text-start pt-3 pb-3 sertice_text_dark">
                                Penyambut dari staff SBA Airport Meet and Greet yang ramah bersama akan menyambut Anda di Curbside of the Airport.
                            </td>
                        </tr>

                        <tr>
                            <td class="text-end pt-3 pb-3 sertice_text_dark">
                                Setelah Anda mendarat, Anda akan disambut oleh para staff SBA Airport Meet and Greet yang ramah di awal gerbang kedatangan atau di ujung jembatan udara (Tergantung pada posisi parkir pesawat).
                            </td>
                            <td class="text-center">
                                <div class="btn btn-services_service">
                                    STEP 2
                                </div>
                            </td>
                            <td class="text-start pt-3 pb-3 sertice_text_dark">
                                Anda akan diberikan bantuan untuk mempercepat berbagai prosedur bandara termasuk In Check, Imigrasi, Keamanan, dan Bea Cukai.
                            </td>
                        </tr>


                        <tr>
                            <td class="text-end pt-3 pb-3 sertice_text_dark">
                                Staff SBA Airport Meet and Greet akan mempercepat perjalanan Anda dengan memberikan bantuan dan mempercepat berbagai formalitas bandara termasuk Imigrasi, Keamanan, dan Bea Cukai.
                            </td>
                            <td class="text-center">
                                <div class="btn btn-services_service">
                                    STEP 2
                                </div>
                            </td>
                            <td class="text-start pt-3 pb-3 sertice_text_dark">
                                Staff SBA Airport Meet and Greet akan mengurus bagasi Anda sampai check-in.
                            </td>
                        </tr>



                        <tr>
                            <td class="text-end pt-3 pb-3 sertice_text_dark">
                                Staff SBA Airport Meet and Greet khusus akan mengurus bagasi Anda di area pengambilan bagasi.
                            </td>
                            <td class="text-center">
                                <div class="btn btn-services_service">
                                    STEP 4
                                </div>
                            </td>
                            <td class="text-start pt-3 pb-3 sertice_text_dark">
                                Anda dapat bersantai di lounge, di mana Anda akan diberi tahu setelah boarding dimulai (hanya berlaku jika bepergian dengan Kelas Bisnis atau Kelas Utama).
                            </td>
                        </tr>

                        <tr>
                            <td class="text-end pt-3 pb-3 sertice_text_dark">
                                Perjalanan yang mulus kini selesai karena Anda akan diantar untuk bertemu dengan anggota keluarga, sopir, atau ke taksi/limo di luar bandara.
                            </td>
                            <td class="text-center">
                                <div class="btn btn-services_service">
                                    STEP 2
                                </div>
                            </td>
                            <td class="text-start pt-3 pb-3 sertice_text_dark">
                                Anda kemudian akan diantar ke gerbang keberangkatan sebelum boarding.
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="service__element d-none" id="myservice2">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="mb-3">
                        <img src="https://static.wixstatic.com/media/eaac09_e863018e40934e379ae7fc506161a81e~mv2.jpg/v1/fill/w_1200,h_800,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/shutterstock_1161782680.jpg" class="img-fluid mx-auto d-block" alt="Responsive image" width="50%">
                    </div>
                    <h2 class="service__title mb-4">VIP & CIP Handling</h2>
                    <p class="service__info mb-2">Dengan layanan pramutamu bandara VVIP kami, kami menyediakan akses istimewa ke terminal VIP yang indah, tersedia di bandara tertentu di seluruh dunia.
                    </p>
                    <p class="service__description">
                        Terminal VIP SBA menawarkan keamanan, privasi, dan kenyamanan berkualitas tinggi sebelum dan sesudah penerbangan Anda, dan dipilih oleh keluarga kerajaan, individu HNW, pejabat tinggi, pengusaha, dan banyak lagi selama perjalanan mereka. Dari terminal pribadi yang berdiri sendiri hingga transfer ke eksekutif lounge, kami memastikan bahwa perjalanan Anda melalui bandara adalah sesuatu yang Anda nantikan. Inilah saatnya Anda mengalami yang terbaik yang ditawarkan dunia bandara.
                    </p>
                </div>
            </div>
        </div>

        <div class="service__element d-none" id="myservice3">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="mb-3">
                        <img src="https://static.wixstatic.com/media/eaac09_1339908940184d5b928258b02687d859~mv2.jpg/v1/fill/w_1200,h_800,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/shutterstock_590791349.jpg" class="img-fluid mx-auto d-block" alt="Responsive image" width="50%">
                    </div>
                    <h2 class="service__title mb-4">Charter Flight
                    </h2>
                    <p class="service__info mb-2">Apakah Anda membutuhkan penerbangan umum meliputi penerbangan instruksional, kesenangan, bisnis, non-komersial, pekerjaan udara, dan penerbangan lainnya?
                    </p>
                    <p class="service__description">
                        Dengan maskapai apa pun, untuk tujuan manapun, dan diluar jadwal penerbangan, kami siap membantu Anda. Di SBA, setiap traveler unik bagi kami, dan tujuan kami adalah menawarkan pengalaman perjalanan yang mudah dan bebas stres kepada mereka.

                        Dengan layanan SBA Meet and Greet, kami memastikan pengalaman yang tak terlupakan dan menyenangkan bagi traveler udara di seluruh dunia.


                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php JSRegister::begin(); ?>
<script>
    window.activeServiceElement = function(id) {
        // disable all active class
        $('.service_box-pilihan').removeClass('active');

        // add active class to clicked element
        // console.log(event);
        $("#pilihanservice" + id).addClass('active');

        // hide all service element
        $('.service__element').addClass('d-none');

        // show clicked service element
        $('#myservice' + id).removeClass('d-none');
    }
</script>
<?php JSRegister::end(); ?>