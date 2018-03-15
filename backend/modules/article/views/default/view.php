<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\data\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?=\Yii::t('app',Html::encode($this->title))?></h3>
        </div>
        <div class="panel-body">
    <p>
        <?= Html::a('<i class="fa fa-pencil"></i> '.Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fa fa-trash"></i> '.Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
                'attribute'=>'cate.name',
                'label'=>Yii::t('app','Cate Name'),
            ],
            [
                'attribute'=>'user.name',
                'format'=>'raw',
                'label'=>Yii::t('app','User Name'),
                'value'=>Html::a(Html::img($model->user['head'],['style'=>"width:70px;heigth:70px;",'alt'=>$model->user['name']]),['/user/default/index','User[id]'=>$model->user_id]),
            ],
            'sort',
            'title',
            'author',
            'cover',
            'abstract',
            [
               'attribute'=>'remain',
               'value'=>$model->getStatusCode('remain','remain_code'),
            ],
            [
               'attribute'=>'auth',
               'value'=>$model->getStatusCode('auth','auth_code'),
            ],
            'tag',
            'commit',
            'view',
            'collection',
            'thumbup',
            'score',
            [
                'attribute'=>'level',
                'value'=>$model->getStatusCode('level','level_code'),
            ],
            [
               'attribute'=>'publish',
               'value'=>$model->getStatusCode('publish','publish_code'),
            ],
            [
               'attribute'=>'status',
               'value'=>$model->getStatusCode('status','status_code'),
            ],
            'add_time:datetime',
            'edit_time:datetime',
            [
                'attribute'=>'content_id',
                'format'=>'raw',
                'value'=>\common\components\widget\EditorMdView::widget([
                    'model' => \common\models\database\ArticleContent::findOne($model->content_id),
                    'attribute' => 'content',
                ]),
            ],
        ],
    ]) ?>
</div>
    </div>
</div>
