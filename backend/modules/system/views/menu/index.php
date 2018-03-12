<?php

use yii\helpers\Html;
use common\components\widget\BatchDelete;
use backend\components\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Menu */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Menus');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">
    <?= \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <div class="panel">
        <div class="panel-body">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create Menu'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= BatchDelete::widget(['name'=>'Batch Deletes']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            'id',
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'app_type',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Menu::$app_type_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('app_type','app_type_code'),
                       ['data-id'=>$model->id,'class'=>'app_type-change btn btn-xs btn-'.$model->getStatusCss('app_type','app_type_css',$model->app_type)]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'position',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Menu::$position_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('position','position_code'),
                       ['data-id'=>$model->id,'class'=>'position-change btn btn-xs btn-'.$model->getStatusCss('position','position_css',$model->position)]);
               },
               'format'=>'raw',
            ],
            'parent_id',
            'name',
            'url:url',
            [
                'attribute'=>'icon',
                'filter'=>false,
                'value'=> function ($model) {
                    return Html::tag('i','',['class'=>$model->icon]);
                },
                'format'=>'raw',
            ],
            //'sort',
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'target',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Menu::$target_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('target','target_code'),
                       ['data-id'=>$model->id,'class'=>'target-change btn btn-xs btn-'.$model->getStatusCss('target','target_css',$model->target)]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'is_absolute_url',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Menu::$is_absolute_url_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('is_absolute_url','is_absolute_url_code'),
                       ['data-id'=>$model->id,'class'=>'is_absolute_url-change btn btn-xs btn-'.$model->getStatusCss('is_absolute_url','is_absolute_url_css',$model->is_absolute_url)]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'is_display',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Menu::$is_display_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('is_display','is_display_code'),
                       ['data-id'=>$model->id,'class'=>'is_display-change btn btn-xs btn-'.$model->getStatusCss('is_display','is_display_css',$model->is_display)]);
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
            //'top_id',
            //'module',
            //'controller',
            //'action',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
<div id="app_type-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="app_type">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Menu::$app_type_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Menu::$app_type_css) && isset(common\models\data\Menu::$app_type_css[$k])){
                        $css = common\models\data\Menu::$app_type_css [$k];
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
</div><div id="position-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="position">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Menu::$position_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Menu::$position_css) && isset(common\models\data\Menu::$position_css[$k])){
                        $css = common\models\data\Menu::$position_css [$k];
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
</div><div id="target-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="target">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Menu::$target_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Menu::$target_css) && isset(common\models\data\Menu::$target_css[$k])){
                        $css = common\models\data\Menu::$target_css [$k];
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
</div><div id="is_absolute_url-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="is_absolute_url">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Menu::$is_absolute_url_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Menu::$is_absolute_url_css) && isset(common\models\data\Menu::$is_absolute_url_css[$k])){
                        $css = common\models\data\Menu::$is_absolute_url_css [$k];
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
</div><div id="is_display-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="is_display">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Menu::$is_display_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Menu::$is_display_css) && isset(common\models\data\Menu::$is_display_css[$k])){
                        $css = common\models\data\Menu::$is_display_css [$k];
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