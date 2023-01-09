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

$this->title = 'Web Config Group ' . $model->name . ', ' . Yii::t('cruds', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Web Config Group', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Edit');
?>

<div class="row">
    <div class="col-md-12">
        <?php if(Yii::$app->request->isAjax == false) : ?>
        <!-- <p>
            <?= Html::a(Yii::t('cruds', 'Kembali'), \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
        </p> -->
        <div class="card m-b-30">
            <div class="card-body">
                <?php endif ?>
                <?php echo $this->render('_form', $model->render()); ?>
                <?php if(Yii::$app->request->isAjax == false) : ?>
            </div>
        </div>
        <?php endif ?>
    </div>
</div>