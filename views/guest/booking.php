<?php

use app\models\Assets;
use richardfan\widget\JSRegister;
use yii\helpers\Url;

$page = "BOOKING";

$jam_kedatangan = [];

// from 08:00 to 16:00 with 15 minutes interval
for ($i = 8; $i <= 16; $i++) {
    for ($j = 0; $j < 60; $j += 15) {
        $jam_kedatangan[] = sprintf("%02d:%02d", $i, $j);
    }
}

?>

<style>
    #map {
        width: 100%;
        height: 500px;
        overflow: hidden;
    }

    .form-check {
        text-align: center;
        border: 1px solid #ccc;
        border-radius: 1rem;
        margin: auto;
        display: block;
        padding: 0;
        padding: .2rem .1rem;
    }

    .form-check .form-check-label {
        margin-bottom: 0;
    }

    .form-check .form-check-input {
        margin-top: 0;
        margin-right: 0.5rem;
    }

    .input-jam {
        outline: none;
        width: 0;
        height: 0;
    }

    .checked {
        background-color: #f1c40f;
        color: #fff;
    }
</style>
<!-- Hero Start -->
<section class="hero-8 minimalhero bg-center position-relative" style="background-image: url(<?= Assets::get($page, "HERO") ?>);" id="home">
    <div class="container">
        <div class="row justify-content-start hero-content">
            <div class="col-md-5">
                <h1 class="font-weight-semibold text-white hero-8-title">
                    <span>BOOKING</span>
                    <br>
                    FORM
                </h1>
            </div><!-- end col -->
        </div><!-- end row -->
    </div>
</section>
<!-- Hero End -->


<section class="section" id="formsection">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-1"></div>
            <div class="col-md-4 mb-3">
                <div class="formbox-pilihan active" id="pilihanform-arrival" onclick="activeFormElement('arrival')">
                    <div class="icon">
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
                    <div class="title">
                        <h4>Arrival</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4 mb-3">

                <div class="formbox-pilihan" id="pilihanform-departure" onclick="activeFormElement('departure')">
                    <div class="icon">
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
                    <div class="title">
                        <h4>DEPARTURE</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</section>

<section id="detailform" class="mb-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="formbox">
                    <!-- show alert -->
                    <?php if (Yii::$app->session->hasFlash('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong class="text-capitalize"><?= Yii::$app->session->getFlash('success') ?></strong>
                        </div>
                    <?php endif; ?>
                    <div class="formbox-title">
                        <h4>Arrival</h4>
                        <p>
                            We Always Ready In Services!
                        </p>
                    </div>
                    <div class="formbox-content">
                        <form action="<?= Url::to(['guest/booking-action']) ?>" class="formbooking" method="POST" id="form-booking">
                            <input type="hidden" name="type" value="arrival">
                            <!-- csrf -->
                            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Jenis Layanan</label>
                                        <select name="jenis_layanan" id="jenis_layanan" class="form-control">
                                            <option value="">Pilih Layanan</option>
                                            <option <?= ($model->jenis_layanan == 'pax_handling') ? 'selected' : '' ?> value="pax_handling">Pax Handling</option>
                                            <option <?= ($model->jenis_layanan == 'vip_cip') ? 'selected' : '' ?> value="vip_cip">VIP & CIP Handling</option>
                                            <option <?= ($model->jenis_layanan == 'charther') ? 'selected' : '' ?> value="charther">Charther Flight</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name" id="label_tanggal_kedatangan">Tanggal Kedatangan</label>
                                        <input type="date" class="form-control" id="tanggal_kedatangan" name="tanggal_kedatangan" placeholder="Tanggal Kedatangan" value="<?= $model->tanggal_kedatangan ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="name" id="label_jam_kedatangan">Jam Kedatangan</label>
                                        <!-- generate checkbox time -->
                                        <div class="table-responsive mt-3">
                                            <div class="row">
                                                <?php foreach ($jam_kedatangan as $key => $value) : ?>
                                                    <div class="col-4 col-md-2 col-lg-1 mb-2">
                                                        <div class="form-check form-check-inline">
                                                            <input class="input-jam" type="checkbox" id="jam_kedatangan_<?= $key ?>" name="jam_kedatangan[]" value="<?= $value ?>">
                                                            <label class="label-jam" for="jam_kedatangan_<?= $key ?>"><?= $value ?></label>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Nama Perusahaan</label>
                                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Nama Perusahaan" value="<?= $model->nama_perusahaan ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Nama Penumpang / Penanggung Jawab</label>
                                        <input type="text" class="form-control" id="nama_penanggungjawab" name="nama_penanggungjawab" placeholder="Nama Penanggungjawab" value="<?= $model->nama_penanggungjawab ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Nomor Penerbangan</label>
                                        <input type="text" class="form-control" id="nomor_penerbangan" name="nomor_penerbangan" placeholder="Nomor Penerbangan" value="<?= $model->nomor_penerbangan ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Nomor Telepon / Whatsapp</label>
                                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Nomor Telepon" value="<?= $model->nomor_telepon ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Jumlah Penumpang / Jemaat</label>
                                        <input type="text" class="form-control" id="jumlah_penumpang" name="jumlah_penumpang" placeholder="Jumlah Penumpang" value="<?= $model->jumlah_penumpang ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= $model->email ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-button">
                                <button type="submit" class="btn btn-submitku">BOOK NOW</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</section>



</section>


<?php JSRegister::begin(); ?>

<script>
    window.activeFormElement = function(type) {
        if (type == "arrival") {
            $("#pilihanform-arrival").addClass("active");
            $("#pilihanform-departure").removeClass("active");

            $("#detailform .formbox-title h4").html("Arrival");
            $("#detailform .formbox-title p").html("We Always Ready In Services!");
            $("#detailform .formbooking input[name='type']").val("arrival");
            $("#label_jam_kedatangan").html("Jam Kedatangan");
            $('#label_tanggal_kedatangan').html('Tanggal Kedatangan');
        } else {
            $("#pilihanform-arrival").removeClass("active");
            $("#pilihanform-departure").addClass("active");

            $("#detailform .formbox-title h4").html("Departure");
            $("#detailform .formbox-title p").html("We Always Ready In Services!");
            $("#detailform .formbooking input[name='type']").val("departure");
            $("#label_jam_kedatangan").html("Jam Keberangkatan");
            $('#label_tanggal_kedatangan').html('Tanggal Keberangkatan');
        }
    }

    // js change color if checkbox is checked
    $(document).on("change", ".input-jam", function() {
        if ($(this).is(":checked")) {
            $(this).parent().addClass("checked");
        } else {
            $(this).parent().removeClass("checked");
        }
    });

    $(document).ready(function() {
        activeFormElement("arrival");
    });

    $('#form-booking').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        var formData = form.serialize();
        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: formData,
            success: function(response) {
                if (response.success) {

                    swal({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });

                    form[0].reset();
                } else {
                    swal({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    })
                }
            },
            error: function() {
                swal({
                    title: 'Error!',
                    text: 'Something went wrong!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                })
            }
        });
        return false;
    });
</script>

<?php JSRegister::end(); ?>