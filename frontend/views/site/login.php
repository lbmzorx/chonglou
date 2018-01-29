<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\user\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '用户登录';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="panel panel-default" id="main-user-login">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="fa fa-comments-o"></i>&nbsp;用户登录
            </h3>
        </div>
        <div class="panel-body">
            <div class="site-login">
                <div class="row">
                    <div class="col-lg-5">
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'password')->passwordInput() ?>

                            <?= $form->field($model, 'rememberMe')->checkbox() ?>

                            <div style="color:#999;margin:1em 0">
                                If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                            </div>

                            <div class="form-group">
                                <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                            </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                    <div class="col-lg-2">
                        <div class="panel panel-default" id="login-error-time-count" style="display:none;">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="fa fa-clock-o"></i>&nbsp登录倒计时
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="text-center"><h2><span class="label label-primary"><span id="time-count"><?=$time?></span>s</span></h2></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->registerJs(<<<SCRYPT

initCountTime();
function initCountTime(){
    var count=parseInt($('#time-count').text());
    if(count>0){
        $('#login-error-time-count').show();
        timedCount(count,function(){
            $('#login-error-time-count').hide();
        });
    }
};

function timedCount(count,callback){
    $('#time-count').text(count);
    if(parseInt(count)>0){
        setTimeout("timedCount("+(parseInt(count)-1)+","+callback+")",1000);
    }else{
        if(typeof callback=="function"){
            callback(true);
        }
    }
}


SCRYPT
,\yii\web\View::POS_END)?>