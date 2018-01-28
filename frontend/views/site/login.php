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
    <div class="panel panel-default" id="main-article-introduce">
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
                                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                            </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
