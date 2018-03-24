<?php

use yii\helpers\Html;
use common\components\widget\BatchDelete;
use backend\components\grid\GridView;
use yii\widgets\Pjax;use common\components\widget\BatchUpdate;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Options */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Options');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="options-index">
    <?= \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <div class="panel">
        <div class="panel-body">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create Options'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= BatchDelete::widget(['name'=>'Batch Deletes']) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Type'),'attribute'=>'type','btnIcon'=>'type', ]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Input Type'),'attribute'=>'input_type','btnIcon'=>'input_type', ]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Autoload'),'attribute'=>'autoload','btnIcon'=>'autoload', ]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            'id',
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'type',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Options::$type_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('type','type_code'),
                       ['data-id'=>$model->id,'class'=>'type-change btn btn-xs btn-'.$model->getStatusCss('type','type_css',$model->type)]);
               },
               'format'=>'raw',
            ],
            'name',
            'value:ntext',
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'input_type',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Options::$input_type_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('input_type','input_type_code'),
                       ['data-id'=>$model->id,'class'=>'input_type-change btn btn-xs btn-'.$model->getStatusCss('input_type','input_type_css',$model->input_type)]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'autoload',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Options::$autoload_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('autoload','autoload_code'),
                       ['data-id'=>$model->id,'class'=>'autoload-change btn btn-xs btn-'.$model->getStatusCss('autoload','autoload_css',$model->autoload)]);
               },
               'format'=>'raw',
            ],
            'tips',
            'sort',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
<div id="type-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="type">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Options::$type_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Options::$type_css) && isset(common\models\data\Options::$type_css[$k])){
                        $css = common\models\data\Options::$type_css [$k];
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
</div><div id="input_type-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="input_type">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Options::$input_type_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Options::$input_type_css) && isset(common\models\data\Options::$input_type_css[$k])){
                        $css = common\models\data\Options::$input_type_css [$k];
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
</div><div id="autoload-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="autoload">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Options::$autoload_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Options::$autoload_css) && isset(common\models\data\Options::$autoload_css[$k])){
                        $css = common\models\data\Options::$autoload_css [$k];
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