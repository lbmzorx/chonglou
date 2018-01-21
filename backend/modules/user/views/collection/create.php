<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\data\ArticleCollection */

$this->title = Yii::t('app', 'Create Article Collection');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Article Collections'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-collection-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
