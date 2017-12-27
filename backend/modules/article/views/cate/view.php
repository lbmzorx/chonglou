<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\data\ArticleCate */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '文章分类'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-cate-view">
    <?= \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <p>
        <?= Html::a(Yii::t('app', '更新'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->id], [
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
