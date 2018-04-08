<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $info common\models\data\AdminMessage */

$this->title = Yii::t('app', 'Create Admin Message');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="admin-message-create">
    <?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>    <?= $this->render('_form', [
        'info' => $info,
        'admin' => $admin,
    ]) ?>

</div>
