<?php

use app\models\Assets;
use richardfan\widget\JSRegister;
use yii\helpers\Url;

?>
<style>
    ::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }

</style>
<!-- Footer Start -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4  col-md-6">
                <div class="mb-4">
                    <a href="#" class="mb-2"><img src="<?= Assets::get('COMMON', 'FOOTER_LOGO') ?>" alt="" class="" height="100" /></a>
                    <h2 class="mb-4">PT. SINAR BINTANG AMANAH</h2>
                    <div class="mb-3">
                        <div class="d-flex mb-3">
                            <i class="fas fa-map-marker-alt text-white text-primary me-2 mt-1"></i>
                            <span>
                                Jalan H. Syukur VII, Airport Village B-06 <br>
                                Sedati Gede, Sedati, Sidoarjo Jawa Timur
                            </span>
                        </div>
                        <a class="d-flex text-white mb-3" href="tel:+6281233435099">
                            <i class="fas fa-phone-alt text-white text-primary me-2 mt-1"></i>
                            <span> +62 812-3343-5099</span>
                        </a>
                        <a class="d-flex text-white mb-3" href="mailto:cs@sinarbintangamanah.com">
                            <i class="fas fa-envelope text-white text-primary me-2 mt-1"></i>
                            <span>
                                cs@sinarbintangamanah.com
                            </span>
                        </a>
                    </div>
                    <div class="medsos_container">
                        <a href="https://www.facebook.com/sinarbintangamanah" target="_blank" class="medsos_link me-5">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://www.instagram.com/sba_amg/" target="_blank" class="medsos_link me-5">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UCY8Y8Z1ZQ5ZQZ5ZQZ5ZQZ5ZQ" target="_blank" class="medsos_link me-5">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-4 col-md-6">
                <div class="row">
                    <div class="col-lg-12 col-12 mt-lg-5 mb-lg-5 mb-2 mt-2">
                        <div class="mt-lg-5 mt-3 mt-lg-0 pt-lg-4 pt-1">
                            <a href="#" class="footerlink text-white mb-3">
                                OUR SERVICES
                            </a>
                            <ul class="list-unstyled footer-sub-menu">
                                <li><a href="javascript: void(0);" class="footerlink_child">Airport Meet & Greet</a></li>
                                <li><a href="javascript: void(0);" class="footerlink_child">VIP & CIP Handling</a></li>
                                <li><a href="javascript: void(0);" class="footerlink_child">Charter Flight</a></li>
                            </ul>
                        </div>
                        <div class="mt-lg-0 pt-3">
                            <a href="#" class="footerlink text-white mb-3">
                                ABOUT US
                            </a>
                        </div>
                        <div class="mt-lg-0 pt-4">
                            <a href="#" class="footerlink text-white mb-3">
                                BOOKING NOW
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-lg-4 col-md-12">
                <div class="row">
                    <div class="col-lg-12 col-12 mt-lg-5 mb-lg-5 mb-2 mt-2">
                        <div class="mt-lg-5 mt-3 mt-lg-0 pt-lg-4 pt-1">
                            <h2 class="footerlink text-white mb-3">
                                TESTIMONI ANDA
                            </h2>

                            <form action="" class="footer_form">
                                <div class="mb-3">
                                    <input type="text" class="form-control" placeholder="Nama Anda" name="nama">
                                </div>
                                <div class="mb-3">
                                    <input type="date" id="footerdatepicker" placeholder="Tanggal" class="form-control" name="tanggal">
                                </div>
                                <div class="mb-3">
                                    <textarea name="testimoni" class="form-control" placeholder="Testimoni Anda" style="height: 150px" rows="4"></textarea>
                                </div>
                                <button type="submit" class="btn">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->


        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mt-5">
                    <p class="text-white-50 f-15 mb-0">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Sinar Bintang Amanah
                    </p>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</footer>

<!-- Footer End -->
<?php JSRegister::begin() ?>
<script>
    $(document).ready(function() {
        $('.footer_form').submit(function(e) {
            e.preventDefault();
            var data = [];
            // add csrf token
            data.push({
                name: '<?= Yii::$app->request->csrfParam ?>',
                value: '<?= Yii::$app->request->csrfToken ?>'
            });

            // add form data
            data.push({
                name: 'nama',
                value: $(this).find('input[name="nama"]').val()
            });

            data.push({
                name: 'tanggal',
                value: $(this).find('input[name="tanggal"]').val()
            });

            data.push({
                name: 'testimoni',
                value: $(this).find('textarea[name="testimoni"]').val()
            });

            $.ajax({
                url: '<?= Url::to(['guest/testimoni-action']) ?>',
                type: 'POST',
                data: data,
                success: function(response) {
                    if (response.success) {
                        swal({
                            icon: 'success',
                            title: 'Terima Kasih',
                            text: 'Testimoni Anda Berhasil Dikirim',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else {
                        swal({
                            icon: 'error',
                            title: 'Gagal',
                            text: 'Testimoni Anda Gagal Dikirim',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                },
                error: function(response) {
                    console.log(response);
                    swal({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Testimoni Anda Gagal Dikirim',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        })
    });
</script>

<?php JSRegister::end() ?>