<?php

use yii\helpers\Html;
use common\components\widget\BatchDelete;
use backend\components\grid\GridView;
use yii\widgets\Pjax;use common\components\widget\BatchUpdate;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Maintain */
/* @var $dataProvider yii\data\ActiveDataProvider */
$request=\yii::$app->getRequest();
$options_id  =Html::encode($request->get('options_id'));
$options_name=Html::encode($request->get('options_name'));
$this->title = Yii::t('app', 'Maintains');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Banner'), 'url' => ['banner/index']];
$this->params['breadcrumbs'][] = ['label' => Html::encode($request->get('options_name')),];
?>
<div class="maintain-index">
    <?= \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <div class="panel">
        <div class="panel-body">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create Maintain'), ['create',
            'options_id'=>$options_id,
            'options_name'=>$options_name,
        ],
            ['class' => 'btn btn-success']) ?>
        <?= BatchDelete::widget(['name'=>'Batch Deletes']) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Show Type'),'attribute'=>'show_type','btnIcon'=>'show_type', ]) ?>
        <?= BatchUpdate::widget([ 'name'=>\Yii::t('model','Status'),'attribute'=>'status','btnIcon'=>'status', ]) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            'id',
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
            'sort',
            'url:url',
            'info',
            [
                'class'=>\common\components\grid\StatusCodeColumn::className(),
                'attribute'=>'status',
                'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Maintain::$status_code,'app'),
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
            [
               'class'=>\common\components\grid\DateTimeColumn::className(),
               'attribute'=>'edit_time',
            ],
            ['class' => 'yii\grid\ActionColumn','template'=>'{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model, $key) use ($options_id,$options_name) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span> ', \yii\helpers\Url::to([
                            'update',
                            'id'=>$model->id,
                            'options_id' => $options_id,
                            'options_name'=>$options_name,
                        ]), [
                            'title' => Yii::t('app', 'Update'),
                            'data-pjax' => '0',
                        ]);
                    }
                ],
            ],
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
        <?php foreach ( common\models\data\Maintain::$status_code as $k=>$v):?>
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                $css='warning';
                if( isset(common\models\data\Maintain::$status_css) && isset(common\models\data\Maintain::$status_css[$k])){
                    $css = common\models\data\Maintain::$status_css [$k];
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
<div id="show_type-change-dom" style="display: none;">
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