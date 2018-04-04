<?php

use yii\helpers\Html;
use common\components\widget\BatchDelete;
use backend\components\grid\GridView;
use yii\widgets\Pjax;use common\components\widget\BatchUpdate;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AdminMessage */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Admin Messages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-message-index">
    <?= \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <div class="panel">
        <div class="panel-body">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create Admin Message'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= BatchDelete::widget(['name'=>'Batch Deletes']) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Spread Type'),'attribute'=>'spread_type','btnIcon'=>'spread_type', ]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Level'),'attribute'=>'level','btnIcon'=>'level', ]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Read'),'attribute'=>'read','btnIcon'=>'read', ]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','From Type'),'attribute'=>'from_type','btnIcon'=>'from_type', ]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            'id',
            'to_admin_id',
            'from_admin_id',
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'spread_type',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\AdminMessage::$spread_type_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('spread_type','spread_type_code'),
                       ['data-id'=>$model->id,'class'=>'spread_type-change btn btn-xs btn-'.$model->getStatusCss('spread_type','spread_type_css',$model->spread_type)]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'level',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\AdminMessage::$level_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('level','level_code'),
                       ['data-id'=>$model->id,'class'=>'level-change btn btn-xs btn-'.$model->getStatusCss('level','level_css',$model->level)]);
               },
               'format'=>'raw',
            ],
            'name',
            'content',
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'read',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\AdminMessage::$read_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('read','read_code'),
                       ['data-id'=>$model->id,'class'=>'read-change btn btn-xs btn-'.$model->getStatusCss('read','read_css',$model->read)]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'from_type',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\AdminMessage::$from_type_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('from_type','from_type_code'),
                       ['data-id'=>$model->id,'class'=>'from_type-change btn btn-xs btn-'.$model->getStatusCss('from_type','from_type_css',$model->from_type)]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\common\components\grid\DateTimeColumn::className(),
               'attribute'=>'add_time',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
<div id="spread_type-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="spread_type">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\AdminMessage::$spread_type_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\AdminMessage::$spread_type_css) && isset(common\models\data\AdminMessage::$spread_type_css[$k])){
                        $css = common\models\data\AdminMessage::$spread_type_css [$k];
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
</div><div id="level-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="level">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\AdminMessage::$level_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\AdminMessage::$level_css) && isset(common\models\data\AdminMessage::$level_css[$k])){
                        $css = common\models\data\AdminMessage::$level_css [$k];
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
</div><div id="read-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="read">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\AdminMessage::$read_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\AdminMessage::$read_css) && isset(common\models\data\AdminMessage::$read_css[$k])){
                        $css = common\models\data\AdminMessage::$read_css [$k];
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
</div><div id="from_type-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="from_type">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\AdminMessage::$from_type_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\AdminMessage::$from_type_css) && isset(common\models\data\AdminMessage::$from_type_css[$k])){
                        $css = common\models\data\AdminMessage::$from_type_css [$k];
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