<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\CommonAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
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
       
        .table-bottom{
            margin-bottom: 0px;
        }
        footer li,h2{
            color:#CDCDCD ;
        }        
        #msg-count{
            position:absolute;
            top:-7px;
            left:9px;
            border:2px solid;
            padding:2px 3px;
            background-color:#F9354C;
        }
STYLE
    )?>
</head>


<body>
<?php $this->beginBody() ?>
<?php
NavBar::begin([
    'brandLabel' => '重楼',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar navbar-default navbar-fixed-top',
    ],
]);
    $menuItems = [
        ['label' => '首页', 'url' => ['/home/index']],
        ['label' => '文章', 'url' => ['/article/index']],
        ['label' => '话题', 'url' => ['/topic/index']],
        ['label' => '说说', 'url' => ['/speak/index']],
        ['label' => '关于', 'url' => ['/site/about']],
    ];
    echo Nav::widget([
        'options' => ['class' => 'nav navbar-nav'],
        'items' => $menuItems,
    ]);

    $rightItems=[];

    $searchInput=Html::input('text','sw',Html::encode(\yii::$app->request->get('sw')),['placeholder'=>'搜索','class'=>'form-control']);
    $searchButton=Html::tag('span',
        Html::submitButton(Html::tag('span','',['class'=>'glyphicon glyphicon-search']),['class'=>'btn btn-default']),
        ['class'=>'input-group-btn']
    );

    if (Yii::$app->user->isGuest) {
        $rightItems[] = ['label' => '注册', 'url' => ['/site/signup']];
        $rightItems[] = ['label' => '登录', 'url' => ['/site/login']];
    }
    else {
        $rightItems[] =[
            'label'=>Html::tag(
                'span',
                Html::tag('span',isset($message)?$message:'13',['class'=>'badge bg-danger','id'=>'msg-count']),
                ['class'=>'glyphicon glyphicon-bell']
            ),
            'encode'=>false,
            'url'=>['/user/message'],

        ];

        $rightItems[] =[
            'label' => Html::img(Url::to(['upload/user/smat']),['alt'=>'lbmzorx']),
            'encode'=>false,
            'items' => [
                ['label' =>Html::tag('i','',['class'=>'fa fa-fw fa-user']).' 个人主页','encode'=>false, 'url' => ['/topic/index']],
                ['label'=>'','options'=>['class'=>['widget'=>'divider']]],
                ['label' =>Html::tag('i','',['class'=>'fa fa-fw fa-cog']).' 账户设置','encode'=>false, 'url' => ['/speak/index']],
                ['label' =>Html::tag('i','',['class'=>'fa fa-fw fa-at']).' 与我相关','encode'=>false, 'url' => ['/speak/index']],
                ['label' =>Html::tag('i','',['class'=>'fa fa-fw fa-list-ol']).' 我的发布','encode'=>false, 'url' => ['/speak/index']],
                ['label'=>'','options'=>['class'=>['widget'=>'divider']]],
                ['label' =>Html::tag('i','',['class'=>'fa fa-fw fa-power-off']).' 退出','encode'=>false, 'url' => ['/site/about']],
            ]
        ];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $rightItems,
    ]);

    echo Html::beginForm(['/home/search',],'get',['class'=>'navbar-form navbar-right','role'=>'search'])
        .Html::tag('div',$searchInput.$searchButton,['class'=>'input-group']).Html::endForm();
NavBar::end();
?>

<div class="container" style="padding-top: 70px;">
    <?=$content?>
</div>

<footer class="footer navbar-inverse" id="footer">
    <div class="container visible-lg-block">
        <div class="row">
            <div class="col-lg-3">
                <h2><i class="fa fa-info-circle"></i> 关于 Yii</h2>
                <ul>
                    <li><a href="/about">Yii 的简介</a></li>
                    <li><a href="/news">Yii 的动态</a></li>
                    <li><a href="/features">Yii 的特性</a></li>
                    <li><a href="/performance">Yii 的性能</a></li>
                    <li><a href="/license">Yii 的许可</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
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
