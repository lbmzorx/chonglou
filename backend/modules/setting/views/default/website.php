<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-03-15 21:16
 */
use common\components\behaviors\StatusCode;
use common\models\data\Options;
/**
 * @var $this \yii\web\View
 * @var $model common\models\data\Options
 */


$this->title = yii::t('app', 'Website Setting');
$this->params['breadcrumbs'][] = yii::t('app', 'Website Setting');
?>
<?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>


<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app','Base Setting')?></h3>
    </div>
    <div class="panel-body">
<?php $form = \yii\widgets\ActiveForm::begin(); ?>
<div class="row">
    <div class="col-lg-6 col-sm-6"><?= $form->field($model, 'website_title') ?></div>
    <div class="col-lg-6 col-sm-6"><?= $form->field($model, 'website_url') ?></div>
</div>
<div class="row">
    <div class="col-lg-6 col-sm-6"><?= $form->field($model, 'seo_keywords') ?></div>
    <div class="col-lg-6 col-sm-6"><?= $form->field($model, 'website_email')?></div>
</div>
<div class="row">
    <div class="col-lg-6 col-sm-6"><?= $form->field($model, 'seo_description')->textarea() ?></div>
    <div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'website_language')->dropDownList([
            'zh-CN' => '简体中文',
            'en-US' => 'English'
        ]) ?>
    </div>
    <div class="col-lg-3 col-sm-3">
        <?php
        $temp = \DateTimeZone::listIdentifiers();
        $timezones = [];
        foreach ($temp as $v) {
            $timezones[$v] = $v;
        }
        ?>
        <?= $form->field($model, 'website_timezone')->dropDownList($timezones) ?>
    </div>
</div>
<div class="row">

</div>
<div class="row">
    <div class="col-lg-6 col-sm-6"><?= $form->field($model, 'website_icp') ?></div>
    <div class="col-lg-6 col-sm-6"><?= $form->field($model, 'website_statics_script')->textarea() ?></div>
</div>
<div class="row">
    <div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'website_comment')->radioList(StatusCode::tranStatusCode(Options::$autoload_code,'app')) ?>
    </div>
    <div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'website_comment_need_verify')->radioList(StatusCode::tranStatusCode(Options::$autoload_code,'app')) ?>
    </div>
    <div class="col-lg-6 col-sm-6">
        <?= $form->field($model, 'website_status')->radioList(StatusCode::tranStatusCode(Options::$site_status_code,'app')) ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <?= \yii\helpers\Html::submitButton(Yii::t('app',Yii::t('app', 'Save')), ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php \yii\widgets\ActiveForm::end(); ?>

    </div>
</div>