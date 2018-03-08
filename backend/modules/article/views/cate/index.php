<?php

use yii\helpers\Html;
use common\components\widget\BatchDelete;
use backend\components\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AritcleCate */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Article Cates');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-cate-index">
    <div class="panel">
        <div class="panel-body">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Article Cate'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        <?= BatchDelete::widget(['name'=>'Batch Deletes']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            'id',
            'name',
            'parent_id',
            'level',
            'path',
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'status',
               'filter'=>common\models\data\ArticleCate::$status_code,
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('status','status_code'),
                       ['class'=>'btn btn-xs btn-'.$model->getStatusCss('status','status_css',0)]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\common\components\grid\DateTimeColumn::className(),
               'attribute'=>'add_time',
            ],
            [
               'class'=>\common\components\grid\DateTimeColumn::className(),
               'attribute'=>'edit_time',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
<div id="status-change" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="status">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\ArticleCate::$status_code as $k=>$v):?>
            <?php if($k>0):?>
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\ArticleCate::$status_css) && isset(common\models\data\ArticleCate::$status_css[$k])){
                        $css = common\models\data\ArticleCate::$status_css [$k];
                    }else{
                        if( isset(\common\components\behaviors\StatusCode::$cssCode[$k]) ){
                            $css=\common\components\behaviors\StatusCode::$cssCode[$k];
                        }
                    }
                ?>               
                <?=Html::input('radio','value',$k)?>
                <?=Html::tag('span',$v,['class'=>'btn btn-'.$css])?>
            </label>
            <?php endif;?>
        <?php endforeach;?>
        <?=Html::endForm()?>
    </div>
</div>