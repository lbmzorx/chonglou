<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\data\ArticleCate */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Article Cates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-cate-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
            'name',
            'parent_id',
            'level',
            'path',
            [
                'attribute'=>'add_time',
                'value'=>date("Y-m-d H:i:s",$model->add_time),
            ],
            [
                'attribute'=>'edit_time',
                'value'=>date("Y-m-d H:i:s",$model->edit_time),
            ],
        ],
    ]) ?>

</div>
