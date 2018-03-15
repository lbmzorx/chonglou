<?php

use yii\helpers\Html;
use common\components\widget\BatchDelete;
use backend\components\grid\GridView;
use yii\widgets\Pjax;use common\components\widget\BatchUpdate;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Commit */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Article Commits');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-commit-index">
    <?= \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <div class="panel">
        <div class="panel-body">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create Article Commit'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= BatchDelete::widget(['name'=>'Batch Deletes']) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Status'),'attribute'=>'status','btnIcon'=>'status', ]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            'id',
            'article_id',
            'user_id',
            'commit_id',
            'content:ntext',
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'status',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\ArticleCommit::$status_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('status','status_code'),
                       ['data-id'=>$model->id,'class'=>'status-change btn btn-xs btn-'.$model->getStatusCss('status','status_css',$model->status)]);
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
<div id="status-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="status">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\ArticleCommit::$status_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\ArticleCommit::$status_css) && isset(common\models\data\ArticleCommit::$status_css[$k])){
                        $css = common\models\data\ArticleCommit::$status_css [$k];
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