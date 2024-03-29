<?php
/**
 * Autogenerated From GII
 * modified by Defri Indra M
 * 2021
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var app\models\search\BookingDataSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="booking-data-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'type') ?>

		<?= $form->field($model, 'jenis_layanan') ?>

		<?= $form->field($model, 'tanggal_kedatangan') ?>

		<?= $form->field($model, 'jam_kedatangan') ?>

		<?php // echo $form->field($model, 'nama_perusahaan') ?>

		<?php // echo $form->field($model, 'nama_penanggungjawab') ?>

		<?php // echo $form->field($model, 'nomor_penerbangan') ?>

		<?php // echo $form->field($model, 'nomor_telepon') ?>

		<?php // echo $form->field($model, 'jumlah_penumpang') ?>

		<?php // echo $form->field($model, 'email') ?>

		<?php // echo $form->field($model, 'creatad_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('cruds', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('cruds', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
