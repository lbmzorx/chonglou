<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\data\ArticleThumbup */

$this->title = Yii::t('app', 'Create Article Thumbup');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Article Thumbups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-thumbup-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
