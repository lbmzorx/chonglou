<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\data\ArticleCommit */

$this->title = Yii::t('app', 'Create Article Commit');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Article Commits'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-commit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
