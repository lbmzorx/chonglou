<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ArticleCate */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '文章分类');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<div class="article-cate-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel">
        <div class="panel-body">
            <p>
                <?= Html::a(Yii::t('app', '添加文章分类'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'parent_id',
            'level',
            'path',
            [
                'attribute'=>'add_time',
                'format'=>['date','php:Y-m-d H:i:s'],
            ],
            [
                'attribute'=>'edit_time',
                'label'=>'编辑时间',
                'format'=>['date','php:Y-m-d H:i:s'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
        </div>
    </div>
