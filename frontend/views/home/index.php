<?php

/* @var $this yii\web\View */

$this->title = '首页';
?>
<div class="row">
    <!--main body-->
    <div class="col-lg-9 col-md-9" id="home-main">
        <div class="panel panel-default" id="main-article-introduce">
            <div class="panel-body">
                <h1>博客</h1>
                <p>一个天才的想法</p>
                <p>哈哈哈</p>
            </div>
        </div>
        <div class="panel panel-default" id="main-article-introduce">
            <div class="panel-body">
                <div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <i class="fa fa-clock-o"></i>
                            快速
                        </div>
                        <div class="col-lg-4 col-md-4">

                            高效
                        </div>
                        <div class="col-lg-4 col-md-4">
                            安全
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        <?php foreach ($articles as $article):?>
                            <li class="list-group-item list-sm-body">
                                <a href="<?=\yii\helpers\Url::to(['article/detail','id'=>$article['id']])?>">
                                    <i class="fa fa-angle-right"></i>
                                    <?=$article['title']?>
                                    <span class="pull-right"><i class="fa fa-comment "></i><?=$article['commit']?>&nbsp;</span>
                                    <span class="pull-right"><i class="fa fa-thumbs-o-up "></i><?=$article['thumbup']?>&nbsp;</span>
                                    <span class="pull-right"><i class="fa fa-folder "></i><?=$article['collection']?>&nbsp;</span>
                                </a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel panel-default" id="main-article-introduce">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-comments-o"></i>&nbsp;最新话题
                    <span class="pull-right"><a href="#">更多...</a></span>
                </h3>
            </div>
            <div class="panel-body ">
                <div class="table-responsive">
                    <table class="table table-hover table-bottom">
                        <thead>
                        <tr>
                            <th>用户</th>
                            <th>话题</th>
                            <th>评论</th>
                            <th>点赞</th>
                            <th>收藏</th>
                            <th>日期</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($topics as $topic):?>
                        <tr>
                            <td><?=$topic['name']?></td>
                            <td><?=$topic['title']?></td>
                            <td><?=$topic['commit']?></td>
                            <td><?=$topic['thumbup']?></td>
                            <td><?=$topic['collection']?></td>
                            <td><?=date("Y-m-d H:i:s",$topic['add_time'])?></td>
                        <tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--/mian body-->
    <!--side body-->
    <div class="col-lg-3 col-md-3" id="home-right">
        <div class="panel panel-default" id="side-signed-today">
            <div class="btn-group">
                <button type="button" class="btn btn-default">按钮 1</button>
                <button type="button" class="btn btn-default">按钮 2</button>
            </div>
        </div>

        <!---->
        <div class="panel panel-default" id="talking">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-comments-o"></i>&nbsp;说说...<span class="pull-right"><a href="#">更多...</a></span></h3>
            </div>
            <div class="panel-body">
                <form role="form" id="search-talking-submit">
                    <div class=" input-group form-group field-feed-content">
                        <textarea type="text" class="form-control" id="name" placeholder="请输入名称" style="resize:none"></textarea>
                        <span class="input-group-btn">
							    	<button type="submit" class="btn btn-success" style="height: 54px;">提交</button>
							    </span>
                    </div>
                </form>
                <div class="nano">
                    <ul class="list-group nano-content" tabindex="0" style="right: -10px;">
                        <li class="list-group-item">
                            <div>
                                <div class="" style="display: table-cell;padding-right:10px;width:50px;vertical-align: top;">
                                    <img src="#" class="center-block">
                                </div>
                                <div class="" style="display:table-cell;">
                                    <div>
                                        <a>user：</a>哈哈哈哈！数量大幅加快两市大幅加快建设离开大幅加快的沙发
                                    </div>
                                    <div>
                                        <span>1天前 </span>
                                        <span class="pull-right"><i class="fa fa-comment "></i>3</span>
                                        <span class="pull-right"><i class="fa fa-thumbs-o-up "></i>4&nbsp;</span>
                                    </div>
                                </div>
                            </div>

                        </li>
                        <li class="list-group-item">
                            <div style="">
                                <div class="" style="display: table-cell;padding-right:10px;width:50px;vertical-align: top;">
                                    <img src="#" class="center-block">
                                </div>
                                <div class="" style="display:table-cell;">
                                    <div>
                                        <a>user：</a>哈哈哈哈！数量大幅加快两市大幅加快建设离开大幅加快的沙发
                                    </div>
                                    <div>
                                        <span>1天前 </span>
                                        <span class="pull-right"><i class="fa fa-comment "></i>3</span>
                                        <span class="pull-right"><i class="fa fa-thumbs-o-up "></i>4</span>
                                    </div>
                                </div>
                            </div>

                        </li>
                        <li class="list-group-item">
                            <div style="">
                                <div class="" style="display: table-cell;padding-right:10px;width:50px;vertical-align: top;">
                                    <img src="#" class="center-block">
                                </div>
                                <div class="" style="display:table-cell;">
                                    <div>
                                        <a>user：</a>哈哈哈哈！数量大幅加快两市大幅加快建设离开大幅加快的沙发
                                    </div>
                                    <div>
                                        <span>1天前 </span>
                                        <span class="pull-right"><i class="fa fa-comment "></i>3</span>
                                        <span class="pull-right"><i class="fa fa-thumbs-o-up "></i>4</span>
                                    </div>
                                </div>
                            </div>
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
        <!--说说-->
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