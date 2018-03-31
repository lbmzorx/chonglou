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
        <?= Html::a('<i class="fa fa-plus-square"></i> '.Yii::t('app', 'Create Banner'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= BatchDelete::widget(['name'=>'Batch Deletes']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            'id',
            'name',
            'value:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{turn-into} {update} {delete}',
                'buttons' => [
                    'turn-into' => function ($url, $model, $key) {
                        return Html::a('<i class="fa fa-mail-reply-all" aria-hidden="true"></i> ', \yii\helpers\Url::to([
                            'banner-content/index',
                            'options_id' => $model->id,
                            'options_name'=>$model->name,
                        ]), [
                            'title' => Yii::t('app', 'Turn Into'),
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
