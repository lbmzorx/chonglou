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
    <div class="panel">
        <div class="panel-body">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Menu'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
        <?= BatchDelete::widget(['name'=>'Batch Deletes']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            'id',
            'sign',
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'app_type',
               'filter'=>common\models\data\Menu::$app_type_code,
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('app_type','app_type_code'),
                       ['class'=>'btn btn-xs btn-'.$model->getStatusCss('app_type','app_type_css',0)]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'position',
               'filter'=>common\models\data\Menu::$position_code,
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('position','position_code'),
                       ['class'=>'btn btn-xs btn-'.$model->getStatusCss('position','position_css',0)]);
               },
               'format'=>'raw',
            ],
            'parent_id',
            'name',
            'url:url',
            //'icon',
            //'sort',
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'target',
               'filter'=>common\models\data\Menu::$target_code,
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('target','target_code'),
                       ['class'=>'btn btn-xs btn-'.$model->getStatusCss('target','target_css',0)]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'is_absolute_url',
               'filter'=>common\models\data\Menu::$is_absolute_url_code,
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('is_absolute_url','is_absolute_url_code'),
                       ['class'=>'btn btn-xs btn-'.$model->getStatusCss('is_absolute_url','is_absolute_url_css',0)]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'is_display',
               'filter'=>common\models\data\Menu::$is_display_code,
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('is_display','is_display_code'),
                       ['class'=>'btn btn-xs btn-'.$model->getStatusCss('is_display','is_display_css',0)]);
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
<div id="app_type-change" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="status">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Menu::$app_type_code as $k=>$v):?>
            <?php if($k>0):?>
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Menu::$app_type_css) && isset(common\models\data\Menu::$app_type_css[$k])){
                        $css = common\models\data\Menu::$app_type_css [$k];
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
</div><div id="position-change" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="status">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Menu::$position_code as $k=>$v):?>
            <?php if($k>0):?>
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Menu::$position_css) && isset(common\models\data\Menu::$position_css[$k])){
                        $css = common\models\data\Menu::$position_css [$k];
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
</div><div id="target-change" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="status">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Menu::$target_code as $k=>$v):?>
            <?php if($k>0):?>
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Menu::$target_css) && isset(common\models\data\Menu::$target_css[$k])){
                        $css = common\models\data\Menu::$target_css [$k];
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
</div><div id="is_absolute_url-change" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="status">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Menu::$is_absolute_url_code as $k=>$v):?>
            <?php if($k>0):?>
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Menu::$is_absolute_url_css) && isset(common\models\data\Menu::$is_absolute_url_css[$k])){
                        $css = common\models\data\Menu::$is_absolute_url_css [$k];
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
</div><div id="is_display-change" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="status">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Menu::$is_display_code as $k=>$v):?>
            <?php if($k>0):?>
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Menu::$is_display_css) && isset(common\models\data\Menu::$is_display_css[$k])){
                        $css = common\models\data\Menu::$is_display_css [$k];
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