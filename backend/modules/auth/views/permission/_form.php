<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\data\Menu;
use common\components\behaviors\StatusCode;
use backend\models\form\Rbac;
/* @var $this yii\web\View */
/* @var $model common\models\data\Menu */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app',$this->title)?></h3>
    </div>
    <div class="panel-body">
<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'group',[
            'class'=>\common\components\widget\DoubleSelect::className(),
            'itemsSelect'=>[
               yii::t('app','New Input'),
               yii::t('app','Build From Select'),
            ],
            'inputSelectOptions'=>['id'=>'rbac_group-radio'],
        ])->textInput()
            ->hiddenDropList($model->getGroups(),['prompt'=>\Yii::t('app','Please Select')]);?>
    </div>
    <div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'category',[
            'class'=>\common\components\widget\DoubleSelect::className(),
            'itemsSelect'=>[
                yii::t('app','New Input'),
                yii::t('app','Build From Select'),
            ],
            'inputSelectOptions'=>['id'=>'rbac_category-radio'],
        ])->textInput()
            ->hiddenDropList($model->getCategories(),['prompt'=>\Yii::t('app','Please Select')]);?>
    </div>
    <div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'method')->dropDownList(StatusCode::tranStatusCode(Rbac::$method_code,'app'),['prompt'=>\Yii::t('app','Please Select')])  ?>
    </div>
    <div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
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
<?php \common\widgets\JsBlock::begin()?>
<script>
    $("#rbac_group-radio").on('change','input',function(){
        var va=$(this).val(),inputDom='#<?=Html::getInputId($model,'group')?>',selectDom=inputDom+'-hidden';
        if(va==0){
            $(inputDom).show();
            $(selectDom).hide();
        }else{
            $(inputDom).hide();
            $(selectDom).show();
        }
    });
    $('#<?=Html::getInputId($model , 'group')?>-hidden').change(function(){
        $('#<?=Html::getInputId($model,'group')?>').val($(this).val());
    });
    $("#rbac_category-radio").on('change','input',function(){
        var va=$(this).val(),inputDom='#<?=Html::getInputId($model,'category')?>',selectDom=inputDom+'-hidden';
        if(va==0){
            $(inputDom).show();
            $(selectDom).hide();
        }else{
            $(inputDom).hide();
            $(selectDom).show();
        }
    });
    $('#<?=Html::getInputId($model , 'category')?>-hidden').change(function(){
        $('#<?=Html::getInputId($model,'category')?>').val($(this).val());
    });
</script>
<?php \common\widgets\JsBlock::end()?>
