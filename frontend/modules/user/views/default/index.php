<?php

$this->title='我的主页';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-2 col-md-2" id="home-right">
        <div class="panel panel-default" id="side-article-news">
            <div class="panel-body">

            </div>
        </div>

        <!--教程-->
        <div class="panel panel-default" id="side-article-teaching">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-comments-o"></i>&nbsp;个人信息...</h3>
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
                            24 7 支持
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

    <!--main body-->
    <div class="col-lg-7 col-md-7" id="home-main">

        <?= \yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>


        <div class="panel panel-default" id="main-article-introduce">
            <div class="panel-body">
                <div class="col-lg-12 col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="<?=\yii\helpers\Url::to(['user'])?>">全部</a></li>
                        <li><a href="<?=\yii\helpers\Url::to(['user','action_type'=>'speak'])?>">说说</a></li>
                        <li><a href="<?=\yii\helpers\Url::to(['user','action_type'=>'article'])?>">文章</a></li>
                        <li><a href="<?=\yii\helpers\Url::to(['user','action_type'=>'topic'])?>">话题</a></li>
                    </ul>
                    <ul class="list-group">
                        <?php foreach ($umsg as $m):?>
                            <li class="list-group-item list-sm-body">
                                <a href="<?=\yii\helpers\Url::to(['article/detail','id'=>$m['id']])?>">
                                    <i class="fa fa-angle-right"></i>
                                    <?=$m['action']?>
                                    <span class="pull-right"><?=\yii::$app->formatter->format($m['add_time'],'datetime')?>&nbsp;</span>
                                </a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/mian body-->
    <!--side body-->
    <div class="col-lg-3 col-md-3" id="home-right">

        <div class="panel panel-default" id="side-article-news">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-comments-o"></i>&nbsp;标签云<span class="pull-right"><a href="#">更多...</a></span></h3>
            </div>
            <div class="panel-body">
                <div class="nano">
                    <ul class="list-group nano-content" tabindex="0" style="right: -10px;">

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
                            24 7 支持
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