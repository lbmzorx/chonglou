<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\data\Tag */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tag-form">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?=Yii::t('app',$this->title)?></h3>
        </div>
        <div class="panel-body">
            <div class="article-form">
    <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-lg-2">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-2">
                        <?= $form->field($model, 'frequence')->textInput() ?>
                    </div>
                </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', '保存'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
