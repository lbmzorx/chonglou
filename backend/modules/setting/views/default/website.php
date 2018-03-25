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
 * @var $website backend\models\form\SettingWebsiteForm
 * @var $smtp backend\models\form\SettingSmtpForm
 */


$this->title = yii::t('app', 'Website Setting');
$this->params['breadcrumbs'][] = yii::t('app', 'Website Setting');
?>
<?= \yii\widgets\Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>


<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app','Base Setting')?></h3>
    </div>
    <div class="panel-body">
<?php $websiteform = \yii\widgets\ActiveForm::begin(['action'=>['save-website'],'method'=>'post',]); ?>
<div class="row">
    <div class="col-lg-6 col-sm-6"><?= $websiteform->field($website, 'website_title') ?></div>
    <div class="col-lg-6 col-sm-6"><?= $websiteform->field($website, 'website_url') ?></div>
</div>
<div class="row">
    <div class="col-lg-6 col-sm-6"><?= $websiteform->field($website, 'seo_keywords') ?></div>
    <div class="col-lg-6 col-sm-6"><?= $websiteform->field($website, 'website_email')?></div>
</div>
<div class="row">
    <div class="col-lg-6 col-sm-6"><?= $websiteform->field($website, 'seo_description')->textarea() ?></div>
    <div class="col-lg-3 col-sm-3">
        <?= $websiteform->field($website, 'website_language')->dropDownList([
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
        <?= $websiteform->field($website, 'website_timezone')->dropDownList($timezones) ?>
    </div>
</div>
<div class="row">

</div>
<div class="row">
    <div class="col-lg-6 col-sm-6"><?= $websiteform->field($website, 'website_icp') ?></div>
    <div class="col-lg-6 col-sm-6"><?= $websiteform->field($website, 'website_statics_script')->textarea() ?></div>
</div>
<div class="row">
    <div class="col-lg-3 col-sm-3">
        <?= $websiteform->field($website, 'website_comment')->radioList(StatusCode::tranStatusCode(Options::$autoload_code,'app')) ?>
    </div>
    <div class="col-lg-3 col-sm-3">
        <?= $websiteform->field($website, 'website_comment_need_verify')->radioList(StatusCode::tranStatusCode(Options::$autoload_code,'app')) ?>
    </div>
    <div class="col-lg-6 col-sm-6">
        <?= $websiteform->field($website, 'website_status')->radioList(StatusCode::tranStatusCode(Options::$site_status_code,'app')) ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-sm-12">
        <?= \yii\helpers\Html::submitButton(Yii::t('app',Yii::t('app', 'Update')), ['class' => 'btn btn-success']) ?>
        <?= \yii\helpers\Html::resetButton(Yii::t('app',Yii::t('app', 'Reset')), ['class' => 'btn btn-default']) ?>
    </div>
</div>
<?php \yii\widgets\ActiveForm::end(); ?>

    </div>
</div>

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app','Smtp Setting')?></h3>
    </div>
    <div class="panel-body">
        <?php $smtpform = \yii\widgets\ActiveForm::begin(['action'=>['save-smtp'],'method'=>'post',]); ?>
        <div class="row">
            <div class="col-lg-6 col-sm-6"><?= $smtpform->field($smtp, 'smtp_host') ?></div>
            <div class="col-lg-6 col-sm-6"><?= $smtpform->field($smtp, 'smtp_port') ?></div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6"><?= $smtpform->field($smtp, 'smtp_username')?></div>
            <div class="col-lg-6 col-sm-6"><?= $smtpform->field($smtp, 'smtp_password')->textInput()?></div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6"><?= $smtpform->field($smtp, 'smtp_nickname')->textInput() ?></div>
            <div class="col-lg-6 col-sm-6"><?= $smtpform->field($smtp, 'smtp_encryption')?></div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <?= \yii\helpers\Html::submitButton(Yii::t('app',Yii::t('app', 'Update')), ['class' => 'btn btn-success']) ?>
                <?= \yii\helpers\Html::button(Yii::t('app',Yii::t('app', 'Test')), ['class' => 'btn btn-info','id'=>'smtp-test']) ?>
                <?= \yii\helpers\Html::resetButton(Yii::t('app',Yii::t('app', 'Reset')), ['class' => 'btn btn-default']) ?>
            </div>
        </div>
        <?php \yii\widgets\ActiveForm::end(); ?>
    </div>
</div>

<?php \common\widgets\JsBlock::begin(); ?>
    <script>
        $("#smtp-test").click(function () {
            layer.msg('<?=Yii::t('app', 'Loading, hold on please...')?>', {icon: 16, 'time': 0});
            $.ajax({
                url: '<?=\yii\helpers\Url::to(['test-smtp'])?>',
                method: 'post',
                data: $("#<?=$smtpform->id?>").serialize(),
                success: function (data) {
                    layer.msg("<?=yii::t('app', 'Success')?>");
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    layer.msg(jqXHR.responseJSON.message);
                },
                compelete: function () {
                    layer.closeAll('loading');
                }
            });
            return false;
        });
    </script>
<?php \common\widgets\JsBlock::end(); ?>