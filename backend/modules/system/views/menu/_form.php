<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\data\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'app_type')->textInput() ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <?= $form->field($model, 'parent_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'target')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_absolute_url')->textInput() ?>

    <?= $form->field($model, 'is_display')->textInput() ?>

    <?= $form->field($model, 'add_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edit_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'top_id')->textInput() ?>

    <?= $form->field($model, 'module')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'controller')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'action')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
