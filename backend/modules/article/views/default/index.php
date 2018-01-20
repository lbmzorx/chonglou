<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Article */
/* @var $dataProvider yii\data\ActiveDataProvider */
\backend\assets\LayuiAsset::register($this);
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

<?php Pjax::begin(); ?>

            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout'=>'{items}<div><div class="page-summary">{summary}</div><div  class="page-box">{pager}</div></div>',

        'pager'=>[
            'class'=>\common\component\widget\JumpPager::className(),
            'firstPageLabel'=>Yii::t('app','首页'),
            'nextPageLabel'=>Yii::t('app','下一页'),
            'prevPageLabel'=>Yii::t('app','上一页'),
            'lastPageLabel'=>Yii::t('app','尾页'),
        ],
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn'],
            [
                'attribute'=>'id',
                'filterInputOptions'=>['class'=>'form-control','style'=>'width:50px'],
            ],
            [
                'attribute'=>'cateName',
                'label'=>'分类',
                'value'=>'cateName.name',
            ],
            'title',
            'author',
            'cover',
            'tags',
            'abstract',
            // 'add_admin_id',
            // 'content:ntext',
            [
                'attribute'=>'remain',
                'filter'=>\common\models\data\Article::$remain_code,
                'value'=> function ($model) {
                    return $model->getStatusCode('remain','remain_code');
                },
            ],
            [
                'attribute'=>'publish',
                'filter'=>\common\models\data\Article::$publish_code,
                'value'=> function ($model) {
                    return $model->getStatusCode('publish','publish_code');
                },
            ],
            [
                'attribute'=>'status',
                'filter'=>\common\models\data\Article::$status_code,
                'value'=> function ($model) {
                    return $model->getStatusCode('status','status_code');
                },
            ],
             [
                 'attribute'=>'add_time',
                 'format'=>'datetime',
                 'filterInputOptions'=>['class'=>'form-control','id'=>'add-time-input'],
             ],
            [
                'attribute'=>'edit_time',
                'format'=>'datetime',
                'filterInputOptions'=>['class'=>'form-control','id'=>'edit-time-input'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttonOptions'=>['data-pjax'=>['_csrf-backend'=>Yii::$app->request->csrfToken,'id'=>'id']],
            ],
        ],
    ]); ?>
            <?=$this->registerJs(<<<SCRIPT
var laydate;
var layuier;
layui.use(['laydate','layer'], function(){
  laydate = layui.laydate;
  layuier = layui.layer;
   //日期时间范围
  laydate.render({
    elem: '#add-time-input'
    ,type: 'datetime'
    ,range: true    
    ,calendar: true
    ,range: '~'
    ,closeStop: '#add-time-input' //这里代表的意思是：点击 test1 所在元素阻止关闭事件冒泡。如果不设定，则无法弹出控件
    ,done: function(value, date, endDate){      
        $(this.elem).val(value);
        $(this.elem).change();
    }
  });
  $('#add-time-input').mouseover(function(){
    layuier.tips($("#add-time-input").val(),"#add-time-input",{
        tips: [1, '#78BA32']       
    });
  });
  
  laydate.render({
    elem: '#edit-time-input'
    ,type: 'datetime'
    ,range: true
    ,calendar: true
    ,closeStop: '#add-time-input' //这里代表的意思是：点击 test1 所在元素阻止关闭事件冒泡。如果不设定，则无法弹出控件
    ,done: function(value, date, endDate){       
        $(this.elem).val(value);
        $(this.elem).change();
    }
  });
});
  
$('#edit-time-input').mouseover(function(){
    layuier.tips($("#edit-time-input").val(),"#edit-time-input",{
        tips: [1, '#78BA32']
    });
});
SCRIPT
                ,\yii\web\View::POS_END)?>

<?php Pjax::end(); ?>
        </div>
    </div>
</div>

