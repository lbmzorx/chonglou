<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\CommonAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

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
        #msg-count{position:absolute;top:-7px;left:9px;border:2px solid;padding:2px 3px;background-color:#F9354C;}
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
    ['label' => '用户', 'items' => [
        ['label' => '话题', 'url' => ['/topic/index']],
        ['label' => '说说', 'url' => ['/speak/index']],
        ['label' => '关于', 'url' => ['/site/about']],
    ]],
];
echo Nav::widget([
    'options' => ['class' => 'nav navbar-nav'],
    'items' => $menuItems,
]);

$rightItems=[

];


$searchInput=Html::input('text','sw',Html::encode(\yii::$app->request->get('sw')),['placeholder'=>'搜索','class'=>'form-control']);
$searchButton=Html::tag('span',
    Html::submitButton(Html::tag('span','',['class'=>'glyphicon glyphicon-search']),
        ['class'=>'btn btn-default']),['class'=>'input-group-btn']);



if (Yii::$app->user->isGuest) {
    $rightItems[] = ['label' => '注册', 'url' => ['/site/signup']];
    $rightItems[] = ['label' => '登录', 'url' => ['/site/login']];
} else {
    $rightItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            '退出 (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
}
$rightItems[] =
    '<li>'.
    Html::a(
        Html::tag('span',
            Html::tag('span',isset($message)?$message:'13',['class'=>'badge bg-danger','id'=>'msg-count']),
            ['class'=>'glyphicon glyphicon-bell']),
        ['/user/message']).
    '</li>';

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $rightItems,
]);

echo Html::beginForm(['/home/search',],'get',['class'=>'navbar-form navbar-right','role'=>'search'])
    .Html::tag('div',$searchInput.$searchButton,['class'=>'input-group']).Html::endForm();
NavBar::end();
?>

<form class="navbar-form navbar-right" role="search">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="搜索">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-default">

            </button>
        </span>
    </div>
</form>

<!-- /Fixed navbar -->
<?=$this->registerJs(<<<SCRIPT
$(".nano").nanoScroller();
SCRIPT
,\yii\web\View::POS_END)?>
<?=$this->endBody()?>
</body>
</html>
<?=$this->endPage()?>
