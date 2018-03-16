<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\data\Article;
use common\components\behaviors\StatusCode;
use common\models\data\ArticleCate;
use common\components\tools\Cate;
/* @var $this yii\web\View */
/* @var $model common\models\data\Article */
/* @var $form yii\widgets\ActiveForm */
/* @var $depance \common\models\data\ArticleContent*/

?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app',Html::encode($this->title))?></h3>
    </div>
    <div class="panel-body">
<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-3 col-sm-3">
            <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-3">
            <?= $form->field($model, 'cover',[
                'class'=>\common\components\widget\UploadImgField::className(),
                'imgOptions'=>[
                    'placeholder'=>'请输入内容',
                ],
            ])->fileInput([]);?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-3">
            <?= $form->field($model, 'cate_id')->dropDownList(Cate::treeArray(Cate::array_cate_as_subarray(ArticleCate::find()->select('id,name,parent_id')->asArray()->indexBy('id')->all(),0,'parent_id')),[]) ?>
        </div>
        <div class="col-lg-3 col-sm-3">
            <?= $form->field($model, 'sort')->textInput() ?>
        </div>
        <div class="col-lg-3 col-sm-3">
            <?= $form->field($model, 'remain')->dropDownList(StatusCode::tranStatusCode(Article::$remain_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
        </div>
        <div class="col-lg-3 col-sm-3">
            <?= $form->field($model, 'score')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <?= $form->field($model, 'abstract')->textarea(['maxlength' => true,'row'=>10]) ?>
        </div>
        <div class="col-lg-3 col-sm-3">
            <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <?= $form->field($depance, 'content',[
                'class'=>\common\components\widget\EditorMdField::className(),
                'mdJsOptions'=>[
                    'placeholder'=>'请输入内容',
                ],
            ])->textarea();?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-3">
            <?= $form->field($model, 'publish')->dropDownList(StatusCode::tranStatusCode(Article::$publish_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
        </div>
        <div class="col-lg-3 col-sm-3">
            <?= $form->field($model, 'status')->dropDownList(StatusCode::tranStatusCode(Article::$status_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
        </div>
        <div class="col-lg-3 col-sm-3">
            <?= $form->field($model, 'auth')->dropDownList(StatusCode::tranStatusCode(Article::$auth_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
        </div>
        <div class="col-lg-3 col-sm-3">
            <?= $form->field($model, 'level')->dropDownList(StatusCode::tranStatusCode(Article::$level_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
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
