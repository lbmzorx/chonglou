<?php

use yii\helpers\Html;
use common\components\widget\BatchDelete;
use backend\components\grid\GridView;
use yii\widgets\Pjax;use common\components\widget\BatchUpdate;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Admin */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Admins');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">
    <?= \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <div class="panel">
        <div class="panel-body">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create Admin'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= BatchDelete::widget(['name'=>'Batch Deletes']) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Status'),'attribute'=>'status','btnIcon'=>'status', ]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],

            'id',
            'name',
            'email:email',
            'mobile',
            [
               'class'=>\common\components\grid\StatusCodeColumn::className(),
               'attribute'=>'status',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Admin::$status_code,'app'),
               'value'=> function ($model) {
                   return Html::button($model->getStatusCode('status','status_code'),
                       ['data-id'=>$model->id,'class'=>'status-change btn btn-xs btn-'.$model->getStatusCss('status','status_css',$model->status)]);
               },
               'format'=>'raw',
            ],
            //'auth_key',
            //'password',
            //'password_reset_token',
            'role_id',
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
<div id="status-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="status">
        <input type="hidden" name="id" value="">
        <?php foreach ( common\models\data\Admin::$status_code as $k=>$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    $css='warning';
                    if( isset(common\models\data\Admin::$status_css) && isset(common\models\data\Admin::$status_css[$k])){
                        $css = common\models\data\Admin::$status_css [$k];
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