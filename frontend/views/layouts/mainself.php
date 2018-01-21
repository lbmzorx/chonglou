<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
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

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta />
    <meta />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>主页</title>
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../vendor/font-awesome-4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../vendor/nanoscroller/nanoscroller.css" />
    <style>

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
    </style>
</head>


<body>

<!-- navbar -->
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
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
                    <a href="#">首页</a>
                </li>
                <li>
                    <a href="#about">关于</a>
                </li>
                <li>
                    <a href="#contact">问答</a>
                </li>
                <li>
                    <a href="#contact">话题</a>
                </li>
                <li>
                    <a href="#contact">热门</a>
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
                        <i class="fa fa-comments-o"></i>&nbsp;列表list框
                        <span class="pull-right"><a href="#">更多...</a></span>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="col-lg-6 col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item list-sm-body">免费域名注册</li>
                            <li class="list-group-item list-sm-body">
                                <i class="fa fa-angle-right"></i>
                                免费 Window 空间托管
                                <span class="pull-right">2017-12-24</span>
                            </li>
                            <li class="list-group-item list-sm-body">
                                <i class="fa fa-angle-right"></i>
                                图像的数量
                                <span class="pull-right">2017-12-24</span>
                            </li>
                            <li class="list-group-item list-sm-body">
                                <i class="fa fa-angle-right"></i>
                                <span class="pull-right">2017-12-24</span>
                                <a href="#" id="">24*7 支持</a>
                            </li>
                            <li class="list-group-item list-sm-body">每年更新成本</li>
                            <li class="list-group-item list-sm-body">
                                <span class="badge">新</span>
                                折扣优惠
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item list-sm-1">免费域名注册</li>
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
            <div class="panel panel-default" id="main-article-introduce">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-comments-o"></i>&nbsp;表格table框
                        <span class="pull-right"><a href="#">更多...</a></span>
                    </h3>
                </div>
                <div class="panel-body ">
                    <div class="table-responsive">
                        <table class="table table-hover table-bottom">
                            <thead>
                            <tr>
                                <th>产品</th>
                                <th>付款日期</th>
                                <th>状态</th></tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>产品1</td>
                                <td>23/11/2013</td>
                                <td>待发货</td></tr>
                            <tr>
                                <td>产品2</td>
                                <td>10/11/2013</td>
                                <td>发货中</td></tr>
                            <tr>
                                <td>产品3</td>
                                <td>20/10/2013</td>
                                <td>待确认</td></tr>
                            <tr>
                                <td>产品4</td>
                                <td>20/10/2013</td>
                                <td>已退货</td></tr>
                            <tr>
                                <td>产品4</td>
                                <td>20/10/2013</td>
                                <td>已退货</td></tr>
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
                    <h3 class="panel-title"><i class="fa fa-comments-o"></i>&nbsp;新闻<span class="pull-right"><a href="#">更多...</a></span></h3>
                </div>
                <div class="panel-body">
                    <div class="nano">
                        <ul class="list-group nano-content" tabindex="0" style="right: -10px;">
                            <li class="list-group-item">
                                <a href="#">螺丝钉解放看来</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#">螺丝钉解放看来</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#">螺丝钉解放看来</a>
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
                    <li>
                        ① <a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=19f92b4525df025f856917537c4a6d9bb8dd6a0fc1c660b408d65cc21fef6c22">4241653</a> <font class="fast">(已满)</font>　
                        ② <a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=38dee71f9bd97c37e131c0722e640fe7c12f459afc67ca34fb82d67dd1ab9b0c">4829703</a> <font class="fast">(已满)</font>
                    </li>
                    <li>
                        ③ <a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=215d55638b0eac69f25b68664d394579994b48b34789149855419c548a620d57">4958407</a> <font class="secure">(未满)</font>　
                        ④ <a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=7aa35873c42e820781a4822e7ba2c7352c3c85454ea9454009fe2c15a2797c5d">5476028</a> <font class="secure">(未满)</font>
                    </li>
                    <li>
                        ⑤ <a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=1a0c961d723cd24f98185b4a631f303efa05c2442f24022c3eb1ddb8b623a270">5478523</a> <font class="fast">(已满)</font>　
                        ⑥ <a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=f0ab6fcfcd0a431c53c0ef8e5538609a6920360c86b73dd401e7e88f1a2795b9">5604716</a> <font class="fast">(已满)</font>
                    </li>
                    <li>
                        ⑦ <a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=143aade31ff7a073a07bdc75d3c960b3f671a76f6f6de0c608c3702b6aac60a7">5629416</a> <font class="fast">(已满)</font>　
                        ⑧ <a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=57b5f15c3b1f35cd2721b45a6eb20fd63cc76a4776e5c1767b521f01c14dec9c">6419794</a> <font class="fast">(已满)</font>
                    </li>
                    <li>
                        ⑨ <a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=77e547190bdda1bac3d1fed071882b53585d63120f65ef656e7f4f0d3112cbdd">7415106</a> <font class="fast">(已满)</font>　
                        ⑩ <a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=d626c01d0074072d2e01219259aab99d10d8691711a2882478c1dbf8a9b5e23e">7594839</a> <font class="fast">(已满)</font>
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
            <span class="pull-left">Copyright © 2009-2017 by <a href="http://www.yiichina.com">Yii China</a>. All Rights Reserved.</span>
            <span class="pull-right hidden-xs hidden-sm">
                技术支持 <a href="http://www.yiiframework.com/" rel="external">chonglou_blog
                <a href="http://www.miibeian.gov.cn" target="_blank">xICP备xxxxxxx号</a>
                <script src="https://s4.cnzz.com/z_stat.php?id=1256642902&amp;web_id=1256642902" language="JavaScript"></script><script src="https://c.cnzz.com/core.php?web_id=1256642902&amp;t=z" charset="utf-8" type="text/javascript"></script><a href="http://www.cnzz.com/stat/website.php?web_id=1256642902" target="_blank" title="站长统计">站长统计</a>
                <a href="/link">友情链接</a>            </span>
        </div>
    </div>
</footer>

<!-- /Fixed navbar -->
<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/nanoscroller/jquery.nanoscroller.min.js"></script>

<script type="text/javascript">
    $(".nano").nanoScroller();

</script>
</body>
</html>


<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => '首页', 'url' => ['/site/index']],
        ['label' => '关于', 'url' => ['/site/about']],
        ['label' => '联系', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
