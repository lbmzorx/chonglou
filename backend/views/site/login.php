<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php
\backend\assets\LoginAsset::register($this);
?>
<?=$this->beginPage()?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>后台登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <?=$this->head()?>
</head>

<body class="pace-done" style="overflow: visible;">
<?=$this->beginBody()?>
<!-- Preloader -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<div class="container">
    <div class="" id="login-wrapper">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div id="logo-login">
                    <h1>后台登录
                        <span>v1.3</span>
                    </h1>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="account-box">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <div class="form-group">
                        <!--a href="#" class="pull-right label-forgot">Forgot email?</a-->
                        <?= $form->field($model, 'name')->label('账号')->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="form-group">
                        <!--a href="#" class="pull-right label-forgot">Forgot password?</a-->
                        <?= $form->field($model, 'password')->label('密码')->passwordInput() ?>
                    </div>
                    <!--  <div class="checkbox pull-left">
                         <label>
                             <input type="checkbox">记住用户名</label>
                     </div> -->
                    <?= Html::submitButton('登录', ['class' => 'btn btn-primary pull-right', 'name' => 'login-button']) ?>
                    <?php ActiveForm::end(); ?>
                    <div class="row-block">
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p>&nbsp;</p>
    <div style="text-align:center;margin:0 auto;">
        <h6 style="color:#fff;">Copyright(C)</h6>
    </div>
</div>
<!--  END OF PAPER WRAP -->
<!-- MAIN EFFECT -->
<?=$this->endBody()?>
</body>
</html>
<?=$this->endPage()?>
