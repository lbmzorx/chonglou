<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\Maintain */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maintain-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'position_type') ?>

    <?= $form->field($model, 'show_type') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'value') ?>

    <?php // echo $form->field($model, 'sign') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'info') ?>

    <?php // echo $form->field($model, 'add_time') ?>

    <?php // echo $form->field($model, 'edit_time') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
