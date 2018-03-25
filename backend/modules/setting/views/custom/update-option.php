<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\data\Options */

$this->title = Yii::t('app', 'Update Options: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Options'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view-option', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="options-update">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
