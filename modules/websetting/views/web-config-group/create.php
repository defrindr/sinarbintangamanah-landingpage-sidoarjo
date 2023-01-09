<?php
/**
 * Autogenerated From GII
 * modified by Defri Indra M
 * 2021
 */

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\modules\websetting\models\WebConfigGroup $model
*/

$this->title = Yii::t('cruds', 'Tambah Baru');
?>

<div class="row">
    <div class="col-md-12">
        <?php if(Yii::$app->request->isAjax == false) : ?>
        <p>
            <?= Html::a(Yii::t('cruds', 'Kembali'), \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
        </p>
        <div class="card m-b-30">
            <div class="card-body">
            <?php endif ?>
                <?= $this->render('_form', $model->render()); ?>
                <?php if(Yii::$app->request->isAjax == false) : ?>
            </div>
        </div>
        <?php endif ?>
    </div>
</div>
