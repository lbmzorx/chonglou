<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\data\Menu;
use common\components\behaviors\StatusCode;
use backend\models\form\Rbac;
/* @var $this yii\web\View */
/* @var $model common\models\data\Menu */
/* @var $form yii\widgets\ActiveForm */

$modelName=\yii\helpers\StringHelper::basename(get_class($model));
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
        <?= $form->field($model, 'name')->textInput(['maxlength' => true])?>
    </div>
    <div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'description')->textInput(['maxlength' => true])?>
    </div>
    <div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'sort')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app','Permissions')?></h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-1 col-sm-1">
                <label class="fancy-checkbox " for="permission-all">
                    <?= Html::checkbox("", false, ['id'=>'permission-all','class'=>'choose-all'])?>
                    <span><strong><?=yii::t('app', 'All Permissions')?></strong></span>
                </label>
            </div>
            <div class="col-lg-11 col-sm-11">
                <?php foreach ($model->getPermissionsByGroup('form') as $key => $value):?>
                <div class="row">
                    <div class="col-lg-2 col-sm-2 text-left">
                        <label class="fancy-checkbox" for="permission-all-<?=$key?>">
                            <?=Html::checkbox("", false, ['id'=>"permission-all-{$key}", 'class'=>'choose-all'])?>
                            <span><strong><?=$key?></strong></span>
                        </label>
                    </div>
                    <div class="col-lg-10 col-sm-10">
                        <?php foreach ($value as $k=>$v):?>
                        <div class="col-lg-2 col-sm-2 text-left">
                            <label class="fancy-checkbox" for="permission-all-<?=$key?>-<?=$k?>">
                                <?=Html::checkbox("", false, ['id'=>"permission-all-{$key}-{$k}", 'class'=>'choose-all'])?>
                                <span><strong><?=$k?></strong></span>
                            </label>
                        </div>
                            <div class="col-lg-10 col-sm-10">
                            <?php foreach ($v as $kk=>$vv):?>
                                <label class="fancy-checkbox " for="permission-<?=$key?>-<?=$k?>-<?=$kk?>" style="display: inline-block;width: 25%">
                                    <?=Html::checkbox("{$modelName}[permissions][{$vv['name']}]",isset($model->permissions[$vv['name']])?$model->permissions[$vv['name']]:false, ['value'=>$vv['name'],'id'=>'permission-'.$key.'-'.$k.'-'.$kk])?>
                                    <span><?=$vv['description']?></span>
                                </label>
                            <?php endforeach;?>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
                <?php endforeach;?>
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
<?php \common\widgets\JsBlock::begin()?>
<script>
    $('.choose-all').click(function(){
        var val=$(this).prop('checked');
        $(this).parent().parent().next().find('input[type="checkbox"]').prop('checked',val);
    });
</script>
<?php \common\widgets\JsBlock::end()?>
