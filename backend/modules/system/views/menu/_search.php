<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'app_type') ?>

    <?= $form->field($model, 'position') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'icon') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'target') ?>

    <?php // echo $form->field($model, 'is_absolute_url') ?>

    <?php // echo $form->field($model, 'is_display') ?>

    <?php // echo $form->field($model, 'add_time') ?>

    <?php // echo $form->field($model, 'edit_time') ?>

    <?php // echo $form->field($model, 'top_id') ?>

    <?php // echo $form->field($model, 'module') ?>

    <?php // echo $form->field($model, 'controller') ?>

    <?php // echo $form->field($model, 'action') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
