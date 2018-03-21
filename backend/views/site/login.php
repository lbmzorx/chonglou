<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\admin\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \backend\assets\LoginAsset;
?>
<?php
LoginAsset::register($this);
$assets_url=$this->assetBundles[LoginAsset::className()]->baseUrl;
?>
<?=$this->beginPage()?>
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>后台登录</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <?= \yii\helpers\Html::csrfMetaTags() ?>
    <!-- VENDOR CSS -->
    <?=$this->head()?>
</head>
<body>
<?=$this->beginBody()?>
<!-- WRAPPER -->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="left">
                    <div class="content">
                        <div class="header">
                            <div class="logo text-center"><img src="<?=$assets_url?>/img/logo-dark.png" alt="Klorofil Logo"></div>
                            <p class="lead">登录后台</p>
                        </div>
                        <?php $form = ActiveForm::begin(['id' => 'login-form','class'=>'form-auth-small']); ?>
                            <div class="form-group">
                                <?= $form->field($model, 'name')
                                    ->label('账号',['class'=>'control-label sr-only','for'=>'signin-username'])
                                    ->textInput(['autofocus' => true,'class'=>'form-control']) ?>
                            </div>
                            <div class="form-group">
                                <?= $form->field($model, 'password')
                                    ->label('密码',['class'=>'control-label sr-only','for'=>'signin-password'])
                                    ->passwordInput() ?>
                            </div>
                        <?= Html::submitButton('登录',['class' =>'btn btn-primary btn-lg btn-block','name' =>'login-button']) ?>
                            <div class="bottom">
                                <span class="helper-text"><i class="fa fa-lock"></i></span>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div class="right">
                    <div class="overlay"></div>
                    <div class="content text">
                        <h1 class="heading">重楼 后台</h1>
                        <p>by The Develovers</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<?=$this->render('//widgets/_flash')?>
<?php $pubkey=\common\components\tools\Rsaenctype::getPubKey(true)?>
<?php $passwordId=Html::getInputId($model,'password')?>
<?=$this->registerJs(<<<SCRYPT
var encrypt = new JSEncrypt();encrypt.setPublicKey('{$pubkey}');    
function do_encrypt(str) { return encrypt.encrypt(str);}
var count=1;
$('#login-form').submit(function(){
    if(count==1){
         $('#{$passwordId}').val(do_encrypt($('#{$passwordId}').val().trim()));
    }
    count++;
});
SCRYPT
)?>
<!-- END WRAPPER -->
<?=$this->endBody()?>
</body>
</html>
<?=$this->endPage()?>
