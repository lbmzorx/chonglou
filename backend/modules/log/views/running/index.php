<?php

use yii\helpers\Html;
use common\components\widget\BatchDelete;
use backend\components\grid\GridView;
use yii\widgets\Pjax;use common\components\widget\BatchUpdate;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Log */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Logs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-index">
    <?= \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <div class="panel">
        <div class="panel-body">
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= BatchDelete::widget(['name'=>'Batch Deletes']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            'id',
            [
               'attribute'=>'level',
               'filter'=>\common\components\behaviors\StatusCode::tranStatusCode(common\models\data\Log::$level_code,'app'),
               'value'=> function ($model) {
                   return Html::tag('span',$model->getStatusCode('level','level_code'),
                       ['data-id'=>$model->id,'class'=>'level-change label label-'.$model->getStatusCss('level','level_css',$model->level)]);
               },
               'format'=>'raw',
            ],
            'category',
            [
               'class'=>\common\components\grid\DateTimeColumn::className(),
               'attribute'=>'log_time',
            ],
            'prefix:ntext',
            'message:ntext',
            ['class' => 'yii\grid\ActionColumn','template'=>'{view} {delete}'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>