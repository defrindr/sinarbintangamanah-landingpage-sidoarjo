<?php

/**
 * Autogenerated From GII
 * modified by Defri Indra M
 * 2021
 */

use app\components\ModalButton;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\AssetsSearch $searchModel
 */

$this->title = Yii::t('cruds', 'Assets');
$this->params['breadcrumbs'][] = $this->title;
?>

<p>

    <?= ModalButton::a('<i class="fa fa-plus"></i>' . Yii::t('cruds', 'Tambah Baru'), ['create'], ['class' => 'btn btn-success', 'title' => Yii::t('cruds', 'Tambah Baru')]) ?>
</p>


<?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <?= GridView::widget([
                        'layout' => '{summary}{items}{pager}',
                        'dataProvider' => $dataProvider,
                        'pager'        => [
                            'class'          => app\components\annex\LinkPager::className(),
                            'firstPageLabel' => Yii::t('cruds', 'First'),
                            'lastPageLabel'  => Yii::t('cruds', 'Last')
                        ],
                        'filterModel' => $searchModel,
                        'tableOptions' => ['class' => 'table table-striped table-borderless table-hover'],
                        'headerRowOptions' => ['class' => 'x'],
                        'columns' => [

                            \app\components\ActionAjaxButton::getButtons(['template' => '{view} {update}']),
                            [
                                'attribute' => 'page',
                                'format' => 'text',
                            ],
                            [
                                'attribute' => 'positiion',
                                'format' => 'text',
                            ],
                            [
                                'attribute' => 'uri',
                                'filter' => false,
                                'format' => 'raw',
                                'value' => function ($model) {
                                    if ($model->type === 'IMAGE') {
                                        return Yii::$app->formatter->asMyImage($model->uri);
                                    } else {
                                        return $model->uri;
                                    }
                                }
                            ],
                            \app\components\ActionAjaxButton::getButtons(['template' => '{delete}']),
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php \yii\widgets\Pjax::end() ?>