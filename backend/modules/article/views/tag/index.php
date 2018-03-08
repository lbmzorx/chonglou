<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Tag */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '标签');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-index">
    <?= \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <div class="panel">
        <div class="panel-body">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <!-- <p>
        <?/*= Html::a(Yii::t('app', 'Create Tag'), ['create'], ['class' => 'btn btn-success']) */?>
    </p>
-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout'=>'{items}<div><div class="page-summary">{summary}</div><div  class="page-box">{pager}</div></div>',

        'pager'=>[
            'class'=>\common\components\widget\JumpPager::className(),
            'firstPageLabel'=>Yii::t('app','首页'),
            'nextPageLabel'=>Yii::t('app','下一页'),
            'prevPageLabel'=>Yii::t('app','上一页'),
            'lastPageLabel'=>Yii::t('app','尾页'),
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'frequence',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </div>
    </div>
</div>
