<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\data\Maintain;
use common\components\behaviors\StatusCode;
/* @var $this yii\web\View */
/* @var $model common\models\data\Maintain */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app',Html::encode($this->title))?></h3>
    </div>
    <div class="panel-body">
<div class="maintain-form">
    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-lg-6 col-sm-6">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-6 col-sm-6">
                <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <?= $form->field($model, 'sign')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-6 col-sm-6">
                <?= $form->field($model, 'info')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-sm-6">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <?= $form->field($model, 'value',[
                    'class'=>\common\components\widget\UploadImgField::className(),
                    'jsOptions'=>[
                        'urlUpload'=>\yii\helpers\Url::to(['/upload/up']),
                        'field'=>'UploadImg[imageFile]',
                    ],
                ])->fileInput([]);?>
            </div>
        </div>
    </div>
</div>


    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app',Yii::t('app', 'Save')), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
    </div>
</div>
