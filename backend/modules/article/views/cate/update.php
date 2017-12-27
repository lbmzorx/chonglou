<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\data\ArticleCate */

$this->title = Yii::t('app', '更新 {modelClass}: ', [
    'modelClass' => '文章分类',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '文章分类'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', '更新');
?>
<?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<div class="article-cate-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
