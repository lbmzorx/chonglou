<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\data\ArticleCate */

$this->title = Yii::t('app', '添加文章分类');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '文章分类'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<div class="article-cate-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
