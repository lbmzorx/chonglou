<?php

use yii\helpers\Html;
use common\components\widget\BatchDelete;
use backend\components\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AdminLog */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Admin Logs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-log-index">
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
            'user_id',
            'route',
            [
                'attribute'=>'description',
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

            ['class' => 'yii\grid\ActionColumn',
                'template'=>'{view} {delete}',
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
