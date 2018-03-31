<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\data\Menu */

$this->title = Yii::t('app', 'Update Permission: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Permissions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name,];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="menu-update">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
