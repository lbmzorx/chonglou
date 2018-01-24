<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\CommonAsset;


CommonAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title)?></title>
    <?php $this->head() ?>
    <?=$this->registerCss(<<<STYLE
.nano{
            height: 300px;
            font-size: 12px;
            line-height: 1.5em;
        }
        .list-group-item{
            border-left:none ;
            border-right:none;
        }
        .nano > .nano-pane {
            width: 6px;
        }
        .list-group-item{
            padding-left:0px ;padding-right: 0px;
        }
        .nano-content {
            padding-right: 8px;
        }

        .list-sm-body{
            border: none;
        }
        tbody > tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }
        .table-bottom{
            margin-bottom: 0px;
        }
        footer li,h2{
            color:#CDCDCD ;
        }
STYLE
    )?>
</head>


<body>
<?php $this->beginBody() ?>
<!-- navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="" style="max-width:40px;max-height: 40px;">重楼
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="<?=\yii\helpers\Url::to(['home/index'])?>">首页</a>
                </li>
                <li>
                    <a href="<?=\yii\helpers\Url::to(['article/index'])?>">文章</a>
                </li>
                <li>
                    <a href="<?=\yii\helpers\Url::to(['topic/index'])?>">话题</a>
                </li>
                <li>
                    <a href="<?=\yii\helpers\Url::to(['speak/index'])?>">说说</a>
                </li>
                <li>
                    <a href="<?=\yii\helpers\Url::to(['sys/index'])?>">关于</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Action</a>
                        </li>
                        <li>
                            <a href="#">Another action</a>
                        </li>
                        <li>
                            <a href="#">Something else here</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li>
                            <a href="#">Separated link</a>
                        </li>
                        <li>
                            <a href="#">One more separated link</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#">消息
                        <span class="badge">3</span>
                    </a>
                </li>
                <li>
                    <a href="#">登录</a>
                </li>
                <li>
                    <a href="#">注册</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Java <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">jmeter</a></li>
                        <li><a href="#">EJB</a></li>
                        <li><a href="#">Jasper Report</a></li>
                        <li class="divider"></li>
                        <li><a href="#">分离的链接</a></li>
                        <li class="divider"></li>
                        <li><a href="#">另一个分离的链接</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="搜索">
                    <span class="input-group-btn">
		                		<button type="submit" class="btn btn-default">
		                			<span class="glyphicon glyphicon-search"></span>
		                		</button>
		                	</span>
                </div>
            </form>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>
<!--/nav-->

<!--main-->
<div class="container" style="padding-top: 70px;">
    <?=$content?>
</div>
<!-- /end main -->
<footer class="footer navbar-inverse" id="footer">
    <div class="container visible-lg-block">
        <div class="row">
            <div class="col-lg-2">
                <h2><i class="fa fa-info-circle"></i> 关于 Yii</h2>
                <ul>
                    <li><a href="/about">Yii 的简介</a></li>
                    <li><a href="/news">Yii 的动态</a></li>
                    <li><a href="/features">Yii 的特性</a></li>
                    <li><a href="/performance">Yii 的性能</a></li>
                    <li><a href="/license">Yii 的许可</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h2><i class="fa fa-book"></i> 文档手册</h2>
                <ul>
                    <li><a href="/doc">中文文档</a></li>
                    <li><a href="/download">框架下载</a></li>
                    <li><a href="/tutorial">中文教程</a></li>
                    <li><a href="/extension">安装扩展</a></li>
                    <li><a href="/code">优秀源码</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h2><i class="fa fa-commenting"></i> 社区资源</h2>
                <ul>
                    <li><a href="/question">社区问答</a></li>
                    <li><a href="/topic">社区讨论</a></li>
                    <li><a href="/case">用户案例</a></li>
                    <li><a href="/video">视频教程</a></li>
                    <li><a href="/top">会员排行</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h2><i class="fa fa-qq"></i> QQ交流群</h2>
                <ul class="list-unstyled">
                    <li><a target="_blank" href="#">4241653</a> <font class="fast">(已满)</font>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h2><i class="fa fa-share-alt"></i> 关注我们</h2>
                <dl>
                    <dt><i class="fa fa-weibo"></i> Yii 中文社区 官方微博</dt>
                    <dd><a href="http://weibo.com/yiichina">http://weibo.com/yiichina</a></dd>
                </dl>
                <dl>
                    <dt><i class="fa fa-github"></i> Yii China GitHub 仓库</dt>
                    <dd><a href="https://github.com/yiichina">https://github.com/yiichina</a></dd>
                </dl>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="clearfix">
            <span class="pull-left">Copyright © 2009-2017 by <a href="http://www.yiichina.com">Chonglou</a>. All Rights Reserved.</span>
            <span class="pull-right hidden-xs hidden-sm">
                技术支持
                <a href="http://www.yiiframework.com/" rel="external">chonglou_blog
                <a href="http://www.miibeian.gov.cn" target="_blank">xICP备xxxxxxx号</a><
                <a href="/link">友情链接</a>
            </span>
        </div>
    </div>
</footer>

<!-- /Fixed navbar -->
<?=$this->registerJs(<<<SCRIPT
$(".nano").nanoScroller();
SCRIPT
,\yii\web\View::POS_END)?>
<?=$this->endBody()?>
</body>
</html>
<?=$this->endPage()?>
