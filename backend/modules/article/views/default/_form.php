<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\data\Article */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=Yii::t('app',$this->title)?></h3>
    </div>
    <div class="panel-body">
        <div class="article-form">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2 col-sm-2">
                    <?= $form->field($model, 'cate_id')->dropDownList(\common\models\crud\ArticleCate::find()
                        ->select(['name','id'])->indexBy('id')->column(),['prompt'=>'请选择状态'])?>
                </div>
                <div class="col-lg-2 col-sm-2">
                    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <?= $form->field($model, 'cover')->fileInput()?>
                </div>
            </div>
            <?= $form->field($model, 'abstract')->textarea(['maxlength' => true]) ?>
            <div class="row">
                <div class="col-lg-2">
                    <?= $form->field($model, 'tags')->input(['maxlength'=>true])?>
                </div>
            </div>
            <?= $form->field($model, 'content',[
                    'class'=>\common\components\widget\EditorMdField::className(),
                    'mdJsOptions'=>[
                        'placeholder'=>'请输入内容',
                    ],
                ])->textarea();?>

            <div class="row">
                <div class="col-lg-2">
                    <?= $form->field($model, 'publish')->dropDownList(\common\models\search\Article::$publish_code,['prompt'=>'请选择状态'])?>
                </div>
                <div class="col-lg-2">
                    <?= $form->field($model, 'status')->dropDownList(\common\models\search\Article::$status_code,['prompt'=>'请选择状态'])?>
                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '创建') : Yii::t('app', '更新'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
