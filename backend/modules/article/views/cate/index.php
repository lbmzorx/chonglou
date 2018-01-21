<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ArticleCate */
/* @var $dataProvider yii\data\ActiveDataProvider */
\common\assets\LayerAsset::register($this);
\common\assets\LayuiAsset::register($this);
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

        'pager'=>[
            'class'=>\common\component\widget\JumpPager::className(),
            'firstPageLabel'=>Yii::t('app','首页'),
            'nextPageLabel'=>Yii::t('app','下一页'),
            'prevPageLabel'=>Yii::t('app','上一页'),
            'lastPageLabel'=>Yii::t('app','尾页'),
        ],
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn',],
            [
                'attribute'=>'id',
                'filterInputOptions'=>['class'=>'form-control','style'=>'width:50px'],
            ],
            'name',
            'parent_id',
            'path',
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
)?>