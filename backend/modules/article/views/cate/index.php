<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ArticleCate */
/* @var $dataProvider yii\data\ActiveDataProvider */
\backend\assets\LayerAsset::register($this);

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
                <?php $plus = Html::tag('i', '', ['class' => "fa fa-plus"]);?>
                <?= Html::a($plus.'&nbsp;'.Yii::t('app', '添加文章分类'), ['create'], ['class' => 'btn btn-success']) ?>
                <?php $trush = Html::tag('i', '', ['class' => "fa fa-trash"]);?>
                <?= Html::button($trush.'&nbsp;'.Yii::t('app', '批量删除'),['class' => 'btn btn-success','id'=>'batch-delete'])?>
            </p>
<?php Pjax::begin(); ?>  <?php $key=GridView::$counter;?>  <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout'=>'{items}<div><div class="page-summary">{summary}</div><div  class="page-box">{pager}</div></div>',
//        'summaryOptions'=>[
//            'class'=>'',
//        ],
        'pager'=>[
            'firstPageLabel'=>Yii::t('app','首页'),
            'nextPageLabel'=>Yii::t('app','下一页'),
            'prevPageLabel'=>Yii::t('app','上一页'),
            'lastPageLabel'=>Yii::t('app','尾页'),
        ],
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn',],

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
<?php
    $deletes=\yii\helpers\Url::to(['deletes']);
    $_csrf=\yii::$app->request->getCsrfToken();
?>
<?=$this->registerJs(<<<SCRIPT
    $('#batch-delete').click(function(){
        var keys = $('#w$key').yiiGridView('getSelectedRows');
        $.post('$deletes',{_csrf:'$_csrf',id:keys},function(res){
            if(res.status){
                layer.msg(res.msg,{time:1000},function(){
                    $.pjax.reload('#w$key');
                });
            }else{
                layer.alert(res.msg);
            }
        },'json');        
    });
    
SCRIPT
)?>