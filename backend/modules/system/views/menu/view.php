<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\data\Menu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-view">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?=\Yii::t('app',Html::encode($this->title))?></h3>
        </div>
        <div class="panel-body">
    <p>
        <?= Html::a('<i class="fa fa-plus-pencil"></i> '.Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-plus-trash"></i> '.Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
               'attribute'=>'app_type',
               'value'=>$model->getStatusCode('app_type','app_type_code'),
            ],
            [
               'attribute'=>'position',
               'value'=>$model->getStatusCode('position','position_code'),
            ],
            'parent_id',
            'name',
            'url:url',
            'icon',
            'sort',
            [
               'attribute'=>'target',
               'value'=>$model->getStatusCode('target','target_code'),
            ],
            [
               'attribute'=>'is_absolute_url',
               'value'=>$model->getStatusCode('is_absolute_url','is_absolute_url_code'),
            ],
            [
               'attribute'=>'is_display',
               'value'=>$model->getStatusCode('is_display','is_display_code'),
            ],
            'add_time',
            'edit_time',
            'top_id',
            'module',
            'controller',
            'action',
        ],
    ]) ?>
</div>
    </div>
</div>
