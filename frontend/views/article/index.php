<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/26
 * Time: 23:53
 */
$this->title='文章列表';
$this->params['breadcrumbs'][] = $this->title;
$this->registerCss(<<<STYLE
  

STYLE
);
?>
<div class="row">
    <!--main body-->
    <div class="col-lg-9 col-md-9" id="home-main">
        <?= \yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div class="panel panel-default" id="main-article-introduce">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-comments-o"></i>&nbsp;文章列表
                    <span class="pull-right"><a href="#">更多...</a></span>
                </h3>
            </div>
            <div class="panel-body">
                <div class="col-lg-12 col-md-12">
                    <ul class="list-group">
                        <?php foreach ($data as $v):?>
                            <li class="list-group-item list-sm-body">
                                <div class="media-left"><a href="<?=\yii\helpers\Url::to(['user/default/index','id'=>$v['user_id']])?>">
                                        <img class="media-object" src="<?=$v['user']['head']?>" alt="<?=$v['user']['name']?>">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <a href="<?=\yii\helpers\Url::to(['user/default/index','id'=>$v['user_id']])?>">
                                            <span><?=$v['user']['name']?></span>
                                        </a>
                                        发布于<span><?=date("Y-m-d H:i:s",$v['add_time'])?></span>
                                    </div>
                                    <div class="media-content">
                                        <a href="<?=\yii\helpers\Url::to(['article/detail','id'=>$v['id']])?>'"><h4><?=$v['title']?></h4></a>
                                    </div>
                                </div>
                                <div class="media-right">
                                    <h4>
                                        <span class="label label-success">
                                             <i class="fa fa-eye "></i>&nbsp;<?=$v['view']?>
                                        </span>
                                    </h4>
                                </div>
                                <div class="media-right">
                                    <h4>
                                        <span class="label label-success">
                                             <i class="fa fa-commenting-o "></i>&nbsp;<?=$v['commit']?>
                                        </span>
                                    </h4>
                                </div>
                                <div class="media-right">
                                    <h4>
                                    <span class="label label-success">
                                        <i class="fa fa-thumbs-o-up "></i>&nbsp;<?=$v['thumbup']?>
                                    </span>
                                    </h4>
                                </div>
                                <div class="media-right">
                                     <h4>
                                         <span class="label label-success">
                                          <i class="fa fa-folder "></i>&nbsp;<?=$v['collection']?>
                                        </span>
                                     </h4>
                                </div>
                            </li>
                        <?php endforeach;?>
                    </ul>
                    <?=\yii\widgets\LinkPager::widget([
                        'pagination'=>$page,
                        'firstPageLabel'=>Yii::t('app','首页'),
                        'nextPageLabel'=>Yii::t('app','下一页'),
                        'prevPageLabel'=>Yii::t('app','上一页'),
                        'lastPageLabel'=>Yii::t('app','尾页'),
                    ])?>
                </div>
            </div>
        </div>
    </div>
    <!--/mian body-->
    <!--side body-->
    <div class="col-lg-3 col-md-3" id="home-right">
        <div class="panel panel-default">
            <div class="panel-body">
                <a class="btn btn-default btn-block" href="<?=\yii\helpers\Url::to(['article/add'])?>"><span class="glyphicon glyphicon-plus"></span>添加文章</a>
            </div>
        </div>

        <div class="panel panel-default" id="side-article-news">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-comments-o"></i>&nbsp;标签云<span class="pull-right"><a href="#">更多...</a></span></h3>
            </div>
            <div class="panel-body">
                <div class="nano">
                    <ul class="list-group nano-content" tabindex="0" style="right: -10px;">
                        <?php $tag_color=\frontend\models\Tag::$tag_color?>
                        <?php $tag_dim=\frontend\models\Tag::$tag_dim?>
                        <?php foreach ($tags as $tag):?>
                            <a href="<?=\yii\helpers\Url::to(['article/detail','tag'=>$tag['name']])?>">
                                <?php $span=\yii\helpers\Html::tag('span',$tag['name'],['class'=>'label label-'.$tag_color[intval($tag['frequence']%5)]])?>
                                <?=\yii\helpers\Html::tag($tag_dim[intval($tag['frequence']%6)],$span)?>
                            </a>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>

        <!--教程-->
        <div class="panel panel-default" id="side-article-teaching">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-comments-o"></i>&nbsp;教程...</h3>
            </div>
            <div class="panel-body">
                <div class="nano">
                    <ul class="list-group nano-content" tabindex="0" style="right: -10px;">
                        <li class="list-group-item">
                            safsad
                        </li>
                        <li class="list-group-item">
                            asdfsadf
                        </li>
                        <li class="list-group-item">
                            asdfsadf
                        </li>
                        <li class="list-group-item">免费 Window 空间托管</li>
                        <li class="list-group-item">图像的数量</li>
                        <li class="list-group-item">
                            <span class="badge">新</span>
                            24*7 支持
                        </li>
                        <li class="list-group-item">每年更新成本</li>
                        <li class="list-group-item">
                            <span class="badge">新</span>
                            折扣优惠
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>