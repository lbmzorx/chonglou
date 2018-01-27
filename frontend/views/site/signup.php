<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="panel panel-default" id="main-article-introduce">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="fa fa-comments-o"></i>&nbsp;注册新用户
            </h3>
        </div>
        <div class="panel-body">
            <div class="site-signup">
                <div class="row">
                    <div class="col-lg-5">
                        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>
                        <?= $form->field($model, 'password_confirm')->passwordInput() ?>
                        <div class="form-group">
                            <?= Html::submitButton(\Yii::t('app','注册'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
