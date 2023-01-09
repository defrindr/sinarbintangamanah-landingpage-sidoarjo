<?php
/**
 * Autogenerated From GII
 * modified by Defri Indra M
 * 2021
 */

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use app\components\annex\Tabs;

/**
* @var yii\web\View $this
* @var app\models\Services $model
*/

$this->title = Yii::t('cruds', 'Services') . ' : ' . $model->title;
?>
<div class="giiant-crud services-view">
    <?php if(Yii::$app->request->isAjax == false) : ?>
    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="fa fa-pencil"></span> ' . Yii::t('cruds', 'Ubah'), ['update', 'id' => $model->id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="fa fa-plus"></span> ' . Yii::t('cruds', 'Tambah Baru'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p class="pull-right">
        <?= Html::a('<span class="fa fa-list"></span> ' . Yii::t('cruds', 'Daftar Services'), ['index'], ['class'=>'btn btn-default']) ?>
    </p>
    <?php endif ?>

    <div class="clearfix"></div>

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12">
            <?php if(Yii::$app->request->isAjax == false) : ?>
            <div class="card m-b-30">
                <div class="card-body">
                <?php endif ?>
                    <?php $this->beginBlock('app\models\Services'); ?>
                    <div class="table-responsive">
                        <?= DetailView::widget([
                            'model' => $model,
                            'options' => ['class' => 'table table-striped table-borderless'],
                            'attributes' => [
    					        [
            'attribute' => 'image',
            'format' => 'myImage',
        ],
					        [
            'attribute' => 'title',
            'format' => 'text',
        ],
					        [
            'attribute' => 'description',
            'format' => 'ntext',
        ],
					        [
            'attribute' => 'link',
            'format' => 'text',
        ],
					        [
            'attribute' => 'content',
            'format' => 'ntext',
        ],
                            ],
                        ]); ?>
                    </div>

                    <hr/>

                    <?= Html::a('<span class="fa fa-trash"></span> ' . Yii::t('cruds', 'Delete'), ['delete', 'id' => $model->id],
                    [
                    'class' => 'btn btn-danger',
                    'data-confirm' => '' . Yii::t('cruds', 'Are you sure to delete this item?') . '',
                    'data-method' => 'post',
                    ]); ?>
                    <?php $this->endBlock(); ?>


                    
                    <?= Tabs::widget(
                    [
                        'id' => 'relation-tabs',
                        'encodeLabels' => false,
                        'items' => [ 
                                                [
                        'label'   => '<b class=""># '.$model->id.'</b>',
                        'content' => $this->blocks['app\models\Services'],
                        'active'  => true,
                    ],
                        ]
                    ]);
                    ?>                <?php if(Yii::$app->request->isAjax == false) : ?>
                </div>
            </div>
            <?php endif ?>
        </div>
    </div>
</div>
