<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Article */
/* @var $dataProvider yii\data\ActiveDataProvider */
\common\assets\LayuiAsset::register($this);
$this->title = Yii::t('app', '文章');
$this->params['breadcrumbs'][] = $this->title;
$status_css=[0=>'warning',1=>'success',2=>'danger'];
$status_css_js=json_encode($status_css);
?>
<div class="article-index">
    <?= \yii\widgets\Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <div class="panel">
        <div class="panel-body">


    <p class="">
        <?= Html::a(Yii::t('app', '创建文章'), ['create'], ['class' => 'btn btn-sm btn-success']) ?>
    </p>

<?php Pjax::begin(); ?>
            <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
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
            [
                'attribute'=>'collection',
                'filter'=>false,
            ],
            [
                'attribute'=>'thumbup',
                'filter'=>false,
            ],
            [
                'attribute'=>'commit',
                'filter'=>false,
            ],
            // 'add_admin_id',
            // 'content:ntext',
            [
                'attribute'=>'remain',
                'filter'=>\common\models\data\Article::$remain_code,
                'value'=> function ($model) {
                    return Html::button($model->getStatusCode('remain','remain_code'),
                        ['class'=>'btn btn-xs btn-'.($model->publish==1?'success':'warning')]);
                },
                'format'=>'raw',
            ],
            [
                'attribute'=>'publish',
                'filter'=>\common\models\data\Article::$publish_code,
                'value'=> function ($model) {
                    return Html::button($model->getStatusCode('publish','publish_code'),
                        ['class'=>'btn btn-xs btn-'.($model->publish==1?'success':'warning')]);
                },
                'format'=>'raw',
            ],
            [
                'attribute'=>'status',
                'filter'=>\common\models\data\Article::$status_code,
                'value'=> function ($model) use ($status_css){
                    return Html::button($model->getStatusCode('status','status_code'),
                        [
                            'class'=>'status-change btn btn-xs btn-'.(isset($status_css[$model->status])?$status_css[$model->status]:'default'),
                            'key'=>$model->status,
                            'id-key'=>$model->id,
                        ]);
                },
                'format'=>'raw',
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
    ,closeStop: '#add-time-input'
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
    ,closeStop: '#add-time-input' 
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

$('.status-change').click(function(){
    var sval=$(this).attr('key'),this_dom=$(this),
        sid=$(this).attr('id-key');
    var dom_status_change=$('#status-change');
    var status_css=$status_css_js;
    
    dom_status_change.find('input[value="'+sval+'"]').prop('checked','true');
    dom_status_change.find('input[name="id"]').val(sid);
    
    layer.open({
        'type':1,
        'content':dom_status_change,
        btn:['确定','取消'],
        yes:function(layindex,laydom){
            var dom_form=laydom.find('form');
            $.post(dom_form.attr('action'),dom_form.serialize(),function(res){
                if(res.status){
                    layer.msg(res.msg,{time:1000},function(){
                        location.reload();
                    });
                }else{
                   layer.msg(res.msg); 
                }
                layer.close(layindex);
            },'json');
        }
    });
});

SCRIPT
              )?>

<?php Pjax::end(); ?>
        </div>
    </div>
</div>
<div id="status-change" style="display: block;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="status">
        <input type="hidden" name="id" value="">
        <?php foreach (\common\models\data\Article::$status_code as $k=>$v):?>
            <?php if($k>0):?>
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?=Html::input('radio','value',$k)?><?=Html::tag('span',$v,[
                    'class'=>'btn btn-'.(isset($status_css[$k])?$status_css[$k]:'default'),])?>
            </label>
            <?php endif;?>
        <?php endforeach;?>
        <?=Html::endForm()?>
    </div>
</div>


