<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\data\ArticleCate */
/* @var $form yii\widgets\ActiveForm */
?>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"><?=Yii::t('app','添加文章分类')?></h3>
        </div>
        <div class="panel-body">
            <div class="article-cate-form">
                <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true])?>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <?= $form->field($model,'parent_id')
                            ->dropDownList(\common\models\search\ArticleCate::find()
                                ->select(['name','id'])
                                ->orderBy('id')
                                ->indexBy('id')
                                ->column(),
                                ['prompt'=>'请选择父级']);?>
                    </div>
                </div>
                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', '创建') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>





