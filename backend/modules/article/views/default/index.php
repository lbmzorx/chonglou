<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Article */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '文章');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">
    <?= \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <div class="panel">
        <div class="panel-body">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '创建文章'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
            <?=Html::beginForm()?>
            <?=Html::endForm()?>

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            'id',
            [
                'attribute'=>'cateName',
                'label'=>'分类',
                'value'=>'cateName.name',
            ],
            'title',
            'author',
            'cover',
            'abstract',
            // 'add_admin_id',
            // 'content:ntext',
            [
                'attribute'=>'remain',
                'filter'=>\common\models\search\Article::$remain_code,
                'value'=> function ($model) {
                    return $model->getStatusCode('remain','remain_code');
                },
            ],
            [
                'attribute'=>'publish',
                'filter'=>\common\models\search\Article::$publish_code,
                'value'=> function ($model) {
                    return $model->getStatusCode('publish','publish_code');
                },
            ],
            [
                'attribute'=>'status',
                'filter'=>\common\models\search\Article::$status_code,
                'value'=> function ($model) {
                    return $model->getStatusCode('status','status_code');
                },
            ],
             'add_time:datetime',
             'edit_time:datetime',
            [
                'class' => 'yii\grid\ActionColumn',
                'buttonOptions'=>['data-pjax'=>['_csrf-backend'=>Yii::$app->request->csrfToken,'id'=>'id']],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
        </div>
    </div>
</div>