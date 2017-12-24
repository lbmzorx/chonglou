<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\data\ArticleCate */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Article Cate',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Article Cates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="article-cate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
