<?php

use yii\helpers\Html;
use common\components\widget\BatchDelete;
use backend\components\grid\GridView;
use yii\widgets\Pjax;use common\components\widget\BatchUpdate;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Maintain */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Maintains');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maintain-index">
    <?= \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <div class="panel">
        <div class="panel-body">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create Maintain'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= BatchDelete::widget(['name'=>'Batch Deletes']) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Position Type'),'attribute'=>'position_type','btnIcon'=>'position_type', ]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Show Type'),'attribute'=>'show_type','btnIcon'=>'show_type', ]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            'id',
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'position_type',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Maintain::$position_type_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('position_type','position_type_code'),
                       ['data-id'=>$model->id,'class'=>'position_type-change btn btn-xs btn-'.$model->getStatusCss('position_type','position_type_css',$model->position_type)]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'show_type',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Maintain::$show_type_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('show_type','show_type_code'),
                       ['data-id'=>$model->id,'class'=>'show_type-change btn btn-xs btn-'.$model->getStatusCss('show_type','show_type_css',$model->show_type)]);
               },
               'format'=>'raw',
            ],
            'name',
            [
                'attribute'=>'value',
                'value'=>function ($model){ return Html::img($model->value,['alt'=>'image','style'=>'width:70px;height:70px;']);},
                'format'=>'raw',
                'filter'=>false,
            ],
            'sign',
            'url:url',
            //'info',
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
<div id="position_type-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="position_type">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Maintain::$position_type_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Maintain::$position_type_css) && isset(common\models\data\Maintain::$position_type_css[$k])){
                        $css = common\models\data\Maintain::$position_type_css [$k];
                    }else{
                        $css=isset(\common\components\behaviors\StatusCode::$cssCode[$k])?\common\components\behaviors\StatusCode::$cssCode[$k]:$css;
                    }
                ?>               
                <?=Html::input('radio','value',$k)?>
                <?=Html::tag('span',\Yii::t('app',$v),['class'=>'btn btn-'.$css])?>
            </label>          
        <?php endforeach;?>
        <?=Html::endForm()?>
    </div>
</div><div id="show_type-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="show_type">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Maintain::$show_type_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Maintain::$show_type_css) && isset(common\models\data\Maintain::$show_type_css[$k])){
                        $css = common\models\data\Maintain::$show_type_css [$k];
                    }else{
                        $css=isset(\common\components\behaviors\StatusCode::$cssCode[$k])?\common\components\behaviors\StatusCode::$cssCode[$k]:$css;
                    }
                ?>               
                <?=Html::input('radio','value',$k)?>
                <?=Html::tag('span',\Yii::t('app',$v),['class'=>'btn btn-'.$css])?>
            </label>          
        <?php endforeach;?>
        <?=Html::endForm()?>
    </div>
</div>