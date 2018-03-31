<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\data\Maintain */
$request=\yii::$app->getRequest();
$options_id  =Html::encode($request->get('options_id'));
$options_name=Html::encode($request->get('options_name'));

$this->title = Yii::t('app', 'Update Maintain: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Banner'), 'url' => ['banner/index','options_id'=>$options_id,'options_name'=>$options_name,]];
$this->params['breadcrumbs'][] = ['label'=>$options_name,'url' =>['index','options_id' => $options_id,'options_name'=>$options_name,]];
$this->params['breadcrumbs'][] = ['label'=>Html::encode($model->name)];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="maintain-update">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= $this->render('_form', [
        'model' => $model,
        'options_id'=>$options_id,
    ]) ?>

</div>
