<?php

/**
 * Autogenerated From GII
 * modified by Defri Indra M
 * 2021
 */

use yii\helpers\Html;
use app\components\annex\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\modules\websetting\models\WebConfig $model
 * @var app\components\annex\ActiveForm $form
 */

?>

<?php $form = ActiveForm::begin([
    'id' => 'WebConfig',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error'
]);

$typeInput = "textarea";
$attr = [
    'rows' => '5',
];
if ($model->group_id == 4) {
    $typeInput = "textInput";
    $attr = [
        'type' => 'color',
    ];
}
?>
<?php echo $form->errorSummary($model); ?>

<div class="clearfix"></div>
<div class="d-flex  flex-wrap">
    <?= $form->field($model, 'group_id', \app\components\Constant::COLUMN())->widget(\kartik\select2\Select2::class, [
        'name' => 'class_name',
        'model' => $model,
        'attribute' => 'group_id',
        'data' => \yii\helpers\ArrayHelper::map(app\modules\websetting\models\WebConfigGroup::find()->all(), 'id', 'name'),
        'options' => [
            'placeholder' => $model->getAttributeLabel('group_id'),
            'multiple' => false,
            'disabled' => (isset($relAttributes) && isset($relAttributes['group_id'])),
        ]
    ]); ?>
    <?= $form->field($model, 'name', \app\components\Constant::COLUMN())->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'value', \app\components\Constant::COLUMN(($model->isNewRecord) ? 2 : 1))->$typeInput($attr) ?>
    <?php if ($model->isNewRecord) : ?>
        <?= $form->field($model, 'default', \app\components\Constant::COLUMN())->$typeInput($attr) ?>
    <?php elseif ($model->isNewRecord == false) : ?>
        <?= $form->field($model, 'active', \app\components\Constant::COLUMN())->checkbox() ?>
    <?php endif ?>
    <div class="clearfix"></div>
</div>
<hr />
<div class="row">
    <div class="col-md-offset-3 col-md-10">
        <?= Html::submitButton('<i class="fa fa-save"></i> Simpan', ['class' => 'btn btn-success']); ?>
        <?php if (Yii::$app->request->isAjax == false) : ?>
            <?= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-default']) ?>
        <?php endif ?>
    </div>
</div>
<?php ActiveForm::end(); ?>