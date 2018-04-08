<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\data\AdminInfo;
use common\components\behaviors\StatusCode;
/* @var $this yii\web\View */
/* @var $model common\models\data\AdminInfo */
/* @var $form yii\widgets\ActiveForm */
/* @var $admin common\models\data\Admin */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-lg-3 col-sm-3">
        <div class="panel">
            <div class="panel-body">
                <div class="text-center">
                    <?= $form->field($admin, 'head',[
                        'class'=>\common\components\widget\UploadImgField::className(),
                        'jsOptions'=>[
                            'urlUpload'=>\yii\helpers\Url::to(['upload']),
                            'field'=>'UploadImg[imageFile]',
                        ],
                    ])->fileInput([]);?>
                    <h3><?=$admin->name?></h3>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-9 col-sm-9">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-3">
                        <?= $form->field($info, 'real_name')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <?= $form->field($info, 'sex')->dropDownList(StatusCode::tranStatusCode(AdminInfo::$sex_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <?= $form->field($info, 'birthday')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-3">
                        <?= $form->field($info, 'province')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <?= $form->field($info, 'city')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <?= $form->field($info, 'county')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-3">
                        <?= $form->field($info, 'address')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <?= $form->field($info, 'identified_card')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-3">
                        <?= $form->field($info, 'qq')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <?= $form->field($info, 'wechat')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-lg-3 col-sm-3">
                        <?= $form->field($info, 'weibo')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-3">
                        <?= $form->field($info, 'other_mongodb')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="form-group">
                            <?= Html::submitButton(Yii::t('app',Yii::t('app', 'Save')), ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>