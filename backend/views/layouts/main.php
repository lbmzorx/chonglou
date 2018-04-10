<?php
    use \backend\assets\CommonAsset;
    CommonAsset::register($this);
    $assets_url=$this->assetBundles[CommonAsset::className()]->baseUrl;
?>
<?=$this->beginPage()?>
<!doctype html>
<html lang="en">
<head>
    <title><?=\yii\helpers\Html::encode($this->title)?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?= \yii\helpers\Html::csrfMetaTags() ?>
    <!-- VENDOR CSS -->
    <?=$this->head()?>
    <?=$this->registerCss(<<<STYLE
    canvas#canvas4 {
            position: relative;
            top: 20px;
        }
STYLE
);?>
</head>

<body>
<?=$this->beginBody()?>
<!-- WRAPPER -->
<div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand" style="padding: 15px 39px">
            <a href="<?=\yii\helpers\Url::to(['/'])?>"><img src="/img/logo-small-x.png" alt="Klorofil Logo" class="img-responsive logo"></a>
        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
            </div>
            <form class="navbar-form navbar-left">
                <div class="input-group">
                    <input type="text" value="" class="form-control" placeholder="Search dashboard...">
                    <span class="input-group-btn"><button type="button" class="btn btn-primary">Go</button></span>
                </div>
            </form>
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <?=\backend\components\widget\MessageWidget::widget([])?>


                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Basic Use</a></li>
                            <li><a href="#">Working With Data</a></li>
                            <li><a href="#">Security</a></li>
                            <li><a href="#">Troubleshooting</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=\yii::$app->getUser()->identity->head?>" class="img-circle" alt="<?=\yii::$app->getUser()->identity->name?>"> <span><?=\yii::$app->getUser()->identity->name?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=\yii\helpers\Url::to(['/admin/default/index'])?>"><i class="lnr lnr-user"></i><span><?=\yii::t('app','My Profile')?></span></a></li>
                            <li><a href="<?=\yii\helpers\Url::to(['/admin/message/index'])?>"><i class="lnr lnr-envelope"></i> <span><?=\yii::t('app','Message')?></span></a></li>
                            <li><a href="<?=\yii\helpers\Url::to(['/admin/message/index'])?>"><i class="lnr lnr-cog"></i> <span><?=\yii::t('app','Settings')?></span></a></li>
                            <li><a href="<?=\yii\helpers\Url::to(['/site/logout'])?>"><i class="lnr lnr-exit"></i> <span><?=\yii::t('app','Logout')?></span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END NAVBAR -->
    <!-- LEFT SIDEBAR -->
    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <?=\backend\components\widget\Leftmenu::widget([
                        'top'=>isset($this->params['top'])?$this->params['top']:'0',
                        'left'=>isset($this->params['left'])?$this->params['left']:\Yii::$app->controller->module->id,
                        'leftsub'=>isset($this->params['leftsub'])?$this->params['leftsub']:\Yii::$app->controller->id,
                        'leftleftsub'=>isset($this->params['leftleftsub'])?$this->params['leftleftsub']:\Yii::$app->controller->action->id,
                    ])?>
                </ul>
            </nav>
        </div>
    </div>
    <!-- END LEFT SIDEBAR -->
    <!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <?= $content ?>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
    <!-- END MAIN -->
    <div class="clearfix"></div>
    <footer>
        <div class="container-fluid">
            <p class="copyright">&copy; 2017 重楼</p>
        </div>
    </footer>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<?= $this->render('//widgets/_flash') ?>
<?=$this->endBody()?>
</body>

</html>
<?=$this->endPage()?>
