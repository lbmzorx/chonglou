<?php

use yii\helpers\Html;
use common\components\widget\BatchDelete;
use backend\components\grid\GridView;
use yii\widgets\Pjax;use common\components\widget\BatchUpdate;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Article */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Articles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">
    <?= \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <div class="panel">
        <div class="panel-body">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create Article'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= BatchDelete::widget(['name'=>'Batch Deletes']) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Remain'),'attribute'=>'remain','btnIcon'=>'remain', ]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Auth'),'attribute'=>'auth','btnIcon'=>'auth', ]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Publish'),'attribute'=>'publish','btnIcon'=>'publish', ]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Status'),'attribute'=>'status','btnIcon'=>'status', ]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Level'),'attribute'=>'level','btnIcon'=>'level', ]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            'id',
            'user_id',
            'cate_id',
            'sort',
            'title',
            //'author',
            //'cover',
            //'abstract',
            //'content_id',
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'remain',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Article::$remain_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('remain','remain_code'),
                       ['data-id'=>$model->id,'class'=>'remain-change btn btn-xs btn-'.$model->getStatusCss('remain','remain_css',$model->remain)]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'auth',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Article::$auth_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('auth','auth_code'),
                       ['data-id'=>$model->id,'class'=>'auth-change btn btn-xs btn-'.$model->getStatusCss('auth','auth_css',$model->auth)]);
               },
               'format'=>'raw',
            ],
            //'tag_id',
            //'commit',
            //'view',
            //'collection',
            //'thumbup',
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'publish',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Article::$publish_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('publish','publish_code'),
                       ['data-id'=>$model->id,'class'=>'publish-change btn btn-xs btn-'.$model->getStatusCss('publish','publish_css',$model->publish)]);
               },
               'format'=>'raw',
            ],
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'status',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Article::$status_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('status','status_code'),
                       ['data-id'=>$model->id,'class'=>'status-change btn btn-xs btn-'.$model->getStatusCss('status','status_css',$model->status)]);
               },
               'format'=>'raw',
            ],
            [
                'class'=>\common\components\grid\StatusCodeColumn::className(),
                'attribute'=>'level',
                'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Article::$level_code,'app'),
                'value'=> function ($model) {
                    return Html::button($model->getStatusCode('level','level_code'),
                        ['data-id'=>$model->id,'class'=>'level-change btn btn-xs btn-'.$model->getStatusCss('level','level_css',$model->level)]);
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
            //'score',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
<div id="remain-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="remain">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Article::$remain_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Article::$remain_css) && isset(common\models\data\Article::$remain_css[$k])){
                        $css = common\models\data\Article::$remain_css [$k];
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
</div><div id="auth-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="auth">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Article::$auth_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Article::$auth_css) && isset(common\models\data\Article::$auth_css[$k])){
                        $css = common\models\data\Article::$auth_css [$k];
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
</div><div id="publish-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="publish">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Article::$publish_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Article::$publish_css) && isset(common\models\data\Article::$publish_css[$k])){
                        $css = common\models\data\Article::$publish_css [$k];
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
</div><div id="status-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="status">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Article::$status_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Article::$status_css) && isset(common\models\data\Article::$status_css[$k])){
                        $css = common\models\data\Article::$status_css [$k];
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
        <?php foreach ( common\models\data\Article::$level_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Article::$level_css) && isset(common\models\data\Article::$level_css[$k])){
                        $css = common\models\data\Article::$level_css [$k];
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