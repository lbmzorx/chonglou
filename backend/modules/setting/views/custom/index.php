<?php

use yii\helpers\Html;
/**
 * @var $this \yii\web\View
 * @var $settings array
 * @var $smtp backend\models\form\SettingSmtpForm
 */
$i=0;
$count=count($settings);

$this->title = yii::t('app', 'Custom Setting');
$this->params['breadcrumbs'][] = yii::t('app', 'Custom Setting');
?>
<?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app','Custom Setting')?></h3>
    </div>
    <div class="panel-body">
        <?php $websiteform = \yii\widgets\ActiveForm::begin(['method'=>'post',]); ?>
        <?php foreach ($settings as $key=>$setting):?>
            <?php if ($i==0):?>
                <div class="row">
            <?php elseif ($i%2==0):?>
                </div><div class="row">
            <?php endif;?>
            <div class="col-lg-6 col-sm-6">
                <?= $websiteform->field($setting, "[{$key}]value",[
                    'class'=>\backend\components\widget\InputAddField::className(),
                    'firstContent'=>'',
                    'endContent'=>Html::a('<i class="fa fa-pencil"></i>',['update-option','id'=>$setting->id],[
                        'title'=>Yii::t('app','Update'),
                        'aria-label'=>Yii::t('app','Update'),
                        'data-pjax'=>0,
                        'class'=>"btn btn-success",
                    ]).Html::a('<i class="fa fa-trash"></i>',['delete-option','id'=>$setting->id],[
                            'title'=>Yii::t('app','Delete'),
                            'aria-label'=>Yii::t('app','Delete'),
                            'data-pjax'=>0,
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'class'=>"btn btn-warning",
                        ]),
                ])->textInput(['maxlength' => true])->label($setting->name)?>
            </div>
        <?php if ($i==($count-1)):?>
            </div>
        <?php endif;?>
        <?php $i++;?>
        <?php endforeach;?>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <?= \yii\helpers\Html::submitButton(Yii::t('app',Yii::t('app', 'Update')), ['class' => 'btn btn-success']) ?>
                <?= \yii\helpers\Html::a(Yii::t('app','Create Custom Setting'),['create-option'],['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <?php \yii\widgets\ActiveForm::end(); ?>

    </div>
</div>
