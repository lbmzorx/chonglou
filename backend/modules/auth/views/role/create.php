<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\data\Menu */

$this->title = Yii::t('app', 'Create Permission');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Permissions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="menu-create">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
