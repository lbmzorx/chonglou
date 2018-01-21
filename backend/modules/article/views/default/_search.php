<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-search">


            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>
    <div class="row">
        <div class="col-lg-2 col-sm-2">
            <?= $form->field($model, 'id') ?>
        </div>
        <div class="col-lg-2 col-sm-2">
            <?= $form->field($model, 'cate_id') ?>
        </div>
        <div class="col-lg-2 col-sm-2">
            <?= $form->field($model, 'title') ?>
        </div>
        <div class="col-lg-2 col-sm-2">
            <?= $form->field($model, 'author') ?>
        </div>
    </div>
            <?php // echo $form->field($model, 'abstract') ?>

            <?php // echo $form->field($model, 'add_admin_id') ?>

            <?php // echo $form->field($model, 'content') ?>

            <?php // echo $form->field($model, 'remain') ?>

            <?php // echo $form->field($model, 'publish') ?>

            <?php // echo $form->field($model, 'status') ?>

            <?php // echo $form->field($model, 'add_time') ?>

            <?php // echo $form->field($model, 'edit_time') ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
            </div>

            <?php ActiveForm::end(); ?>

</div>

