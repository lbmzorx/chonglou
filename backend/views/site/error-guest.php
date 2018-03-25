<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/23
 * Time: 0:56
 */
/* @var $name string */
/* @var $message string */
$this->title = $name;
\backend\assets\BadRequestAsset::register($this);
if(empty($this->title)){
    if($warning=\yii::$app->getSession()->getFlash('warning')){
        $message = $warning;
        $this->title=\yii::t('app','Warning');
    }else if($error=\yii::$app->getSession()->getFlash('error')){
        $message = $error;
        $this->title=\yii::t('app','Error');
    }
}
?>
<?=$this->beginPage()?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title><?=\yii\helpers\Html::encode($this->title)?></title>
    <?= \yii\helpers\Html::csrfMetaTags() ?>
    <?=$this->head()?>
</head>
<body>
<?=$this->beginBody()?>
<div class="container">
    <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
            <div class="col-middle">
                <div class="text-center text-center">
                    <h1 class="error-number"><i class="fa fa-warning text-danger"></i><?= \yii\helpers\Html::encode($this->title) ?></h1>
                    <h2></h2>
                    <p><?= nl2br(\yii\helpers\Html::encode($message))?></p>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
    <?=$this->render('/widgets/_flash');?>
</div>
<?=$this->endBody()?>
</body>
</html>
<?=$this->endPage()?>