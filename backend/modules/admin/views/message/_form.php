<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\data\AdminMessage;
use common\components\behaviors\StatusCode;
use common\models\data\Admin;
/* @var $this yii\web\View */
/* @var $model common\models\data\AdminMessage */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app',Html::encode($this->title))?></h3>
    </div>
    <div class="panel-body">
<div class="admin-message-form">

    <?php $form = ActiveForm::begin(); ?>

<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'to_admin_id')->dropDownList(
            \yii\helpers\ArrayHelper::getColumn(Admin::find()
            ->select('id,name')
            ->where(['status'=>Admin::ADMIN_STATUS_ACTIVE])->andWhere(['not in','id',\yii::$app->user->id])
            ->indexBy('id')
            ->asArray()
            ->all(),'name'),['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'spread_type')->dropDownList(StatusCode::tranStatusCode(AdminMessage::$spread_type_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'level')->dropDownList(StatusCode::tranStatusCode(AdminMessage::$level_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'content')->textInput(['maxlength' => true]) ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'read')->dropDownList(StatusCode::tranStatusCode(AdminMessage::$read_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'from_type')->dropDownList(StatusCode::tranStatusCode(AdminMessage::$from_type_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
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
