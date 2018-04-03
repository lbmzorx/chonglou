<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\data\Menu;
use common\components\behaviors\StatusCode;
/* @var $this yii\web\View */
/* @var $model common\models\data\Menu */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title"><?=\Yii::t('app',$this->title)?></h3>
    </div>
    <div class="panel-body">
<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'app_type')->dropDownList(StatusCode::tranStatusCode(Menu::$app_type_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'position')->dropDownList(StatusCode::tranStatusCode(Menu::$position_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'parent_id')->dropDownList(Menu::getMenusName([
	            'app_type'=>Menu::MENU_APP_TYPE_BACKEND,
            ]),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'sort')->textInput() ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'target')->dropDownList(StatusCode::tranStatusCode(Menu::$target_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'is_absolute_url')->dropDownList(StatusCode::tranStatusCode(Menu::$is_absolute_url_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'is_display')->dropDownList(StatusCode::tranStatusCode(Menu::$is_display_code,'app'),['prompt'=>\Yii::t('app','Please Select')]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'top_id')->textInput() ?>
	</div>
    <div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'icon',[
            'class'=>\backend\components\widget\InputAddField::className(),
            'firstContent'=>Html::tag('i','',['class'=>$model->icon,]),
            'firstOption'=>['id'=>'icon-show'],
            'endContent'=>'<button class="btn btn-success" id="icon-change" type="button"><i class="fa fa-search"></i></button>',
        ])->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-sm-3">
        <?= $form->field($model, 'module')->textInput(['maxlength' => true]) ?>
    </div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'controller')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-lg-3 col-sm-3">
	    <?= $form->field($model, 'action')->textInput(['maxlength' => true]) ?>
	</div>
</div>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app',Yii::t('app', 'Save')), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
    </div>
</div>
<div class="panel" id="icon-list" style="display: none;">
    <div class="panel-body">
        <div class="row">
            <hr>
            <label>切换下拉菜单</label><br>
            <a href="javascript:void(0)"><i class="fa fa-flag fa-fw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-wheelchair-alt fa-fw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-camera-retro fa-fw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-universal-access fa-fw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-spock-o fa-fw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-ship fa-fw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-venus fa-fw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-image-o fa-fw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-spinner fa-fw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-check-square fa-fw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-credit-card fa-fw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-pie-chart fa-fw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-won fa-fw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-text-o fa-fw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-arrow-right fa-fw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-play-circle fa-fw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-facebook-official fa-fw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-medkit fa-fw" ></i></a>
            <hr>
            <label for="">最新的4.7版，新增了41个图标</label><br>
            <a href="javascript:void(0)"><i class="fa fa-address-book" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-address-book-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-address-card" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-address-card-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bandcamp" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bath" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bathtub" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-drivers-license" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-drivers-license-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-eercast" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-envelope-open" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-envelope-open-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-etsy" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-free-code-camp" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-grav" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-handshake-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-id-badge" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-id-card" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-id-card-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-imdb" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-linode" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-meetup" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-microchip" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-podcast" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-quora" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-ravelry" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-s15" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-shower" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-snowflake-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-superpowers" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-telegram" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-0" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-1" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-2" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-3" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-4" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-empty" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-full" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-half" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-quarter" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-three-quarters" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-times-rectangle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-times-rectangle-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-user-circle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-user-circle-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-user-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-vcard" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-vcard-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-window-close" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-window-close-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-window-maximize" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-window-minimize" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-window-restore" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-wpexplorer" ></i></a>
            <hr>
            <label for="">Web Application Icons</label><br>
            <a href="javascript:void(0)"><i class="fa fa-address-book" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-address-book-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-address-card" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-address-card-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-adjust" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-american-sign-language-interpreting" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-anchor" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-archive" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-area-chart" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-arrows" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-arrows-h" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-arrows-v" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-asl-interpreting" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-assistive-listening-systems" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-asterisk" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-at" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-audio-description" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-automobile" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-balance-scale" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-ban" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bank" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bar-chart" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bar-chart-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-barcode" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bars" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bath" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bathtub" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-battery" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-battery-0" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-battery-1" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-battery-2" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-battery-3" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-battery-4" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-battery-empty" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-battery-full" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-battery-half" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-battery-quarter" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-battery-three-quarters" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bed" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-beer" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bell" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bell-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bell-slash" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bell-slash-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bicycle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-binoculars" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-birthday-cake" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-blind" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bluetooth" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bluetooth-b" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bolt" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bomb" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-book" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bookmark" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bookmark-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-braille" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-briefcase" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bug" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-building" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-building-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bullhorn" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bullseye" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bus" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-cab" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-calculator" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-calendar" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-calendar-check-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-calendar-minus-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-calendar-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-calendar-plus-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-calendar-times-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-camera" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-camera-retro" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-car" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-caret-square-o-down" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-caret-square-o-left" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-caret-square-o-right" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-caret-square-o-up" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-cart-arrow-down" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-cart-plus" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-cc" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-certificate" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-check" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-check-circle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-check-circle-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-check-square" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-check-square-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-child" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-circle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-circle-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-circle-o-notch" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-circle-thin" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-clock-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-clone" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-close" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-cloud" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-cloud-download" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-cloud-upload" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-code" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-code-fork" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-coffee" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-cog" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-cogs" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-comment" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-comment-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-commenting" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-commenting-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-comments" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-comments-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-compass" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-copyright" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-creative-commons" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-credit-card" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-credit-card-alt" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-crop" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-crosshairs" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-cube" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-cubes" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-cutlery" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-dashboard" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-database" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-deaf" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-deafness" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-desktop" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-diamond" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-dot-circle-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-download" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-drivers-license" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-drivers-license-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-edit" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-ellipsis-h" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-ellipsis-v" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-envelope" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-envelope-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-envelope-open" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-envelope-open-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-envelope-square" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-eraser" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-exchange" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-exclamation" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-exclamation-circle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-exclamation-triangle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-external-link" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-external-link-square" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-eye" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-eye-slash" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-eyedropper" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-fax" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-feed" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-female" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-fighter-jet" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-archive-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-audio-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-code-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-excel-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-image-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-movie-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-pdf-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-photo-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-picture-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-powerpoint-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-sound-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-video-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-word-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-zip-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-film" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-filter" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-fire" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-fire-extinguisher" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-flag" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-flag-checkered" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-flag-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-flash" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-flask" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-folder" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-folder-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-folder-open" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-folder-open-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-frown-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-futbol-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-gamepad" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-gavel" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-gear" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-gears" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-gift" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-glass" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-globe" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-graduation-cap" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-group" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-grab-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-lizard-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-paper-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-peace-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-pointer-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-rock-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-scissors-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-spock-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-stop-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-handshake-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hard-of-hearing" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hashtag" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hdd-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-headphones" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-heart" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-heart-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-heartbeat" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-history" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-home" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hotel" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hourglass" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hourglass-1" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hourglass-2" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hourglass-3" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hourglass-end" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hourglass-half" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hourglass-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hourglass-start" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-i-cursor" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-id-badge" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-id-card" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-id-card-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-image" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-inbox" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-industry" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-info" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-info-circle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-institution" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-key" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-keyboard-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-language" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-laptop" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-leaf" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-legal" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-lemon-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-level-down" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-level-up" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-life-bouy" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-life-buoy" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-life-ring" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-life-saver" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-lightbulb-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-line-chart" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-location-arrow" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-lock" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-low-vision" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-magic" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-magnet" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-mail-forward" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-mail-reply" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-mail-reply-all" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-male" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-map" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-map-marker" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-map-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-map-pin" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-map-signs" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-meh-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-microchip" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-microphone" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-microphone-slash" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-minus" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-minus-circle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-minus-square" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-minus-square-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-mobile" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-mobile-phone" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-money" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-moon-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-mortar-board" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-motorcycle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-mouse-pointer" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-music" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-navicon" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-newspaper-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-object-group" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-object-ungroup" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-paint-brush" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-paper-plane" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-paper-plane-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-paw" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-pencil" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-pencil-square" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-pencil-square-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-percent" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-phone" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-phone-square" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-photo" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-picture-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-pie-chart" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-plane" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-plug" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-plus" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-plus-circle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-plus-square" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-plus-square-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-podcast" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-power-off" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-print" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-puzzle-piece" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-qrcode" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-question" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-question-circle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-question-circle-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-quote-left" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-quote-right" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-random" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-recycle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-refresh" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-registered" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-remove" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-reorder" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-reply" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-reply-all" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-retweet" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-road" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-rocket" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-rss" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-rss-square" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-s15" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-search" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-search-minus" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-search-plus" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-send" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-send-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-server" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-share" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-share-alt" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-share-alt-square" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-share-square" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-share-square-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-shield" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-ship" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-shopping-bag" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-shopping-basket" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-shopping-cart" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-shower" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sign-in" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sign-language" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sign-out" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-signal" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-signing" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sitemap" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sliders" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-smile-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-snowflake-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-soccer-ball-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sort" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sort-alpha-asc" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sort-alpha-desc" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sort-amount-asc" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sort-amount-desc" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sort-asc" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sort-desc" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sort-down" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sort-numeric-asc" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sort-numeric-desc" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sort-up" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-space-shuttle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-spinner" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-spoon" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-square" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-square-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-star" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-star-half" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-star-half-empty" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-star-half-full" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-star-half-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-star-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sticky-note" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sticky-note-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-street-view" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-suitcase" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sun-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-support" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-tablet" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-tachometer" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-tag" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-tags" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-tasks" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-taxi" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-television" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-terminal" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-0" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-1" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-2" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-3" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-4" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-empty" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-full" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-half" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-quarter" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thermometer-three-quarters" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thumb-tack" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thumbs-down" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thumbs-o-down" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thumbs-o-up" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thumbs-up" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-ticket" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-times" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-times-circle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-times-circle-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-times-rectangle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-times-rectangle-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-tint" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-toggle-down" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-toggle-left" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-toggle-off" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-toggle-on" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-toggle-right" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-toggle-up" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-trademark" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-trash" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-trash-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-tree" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-trophy" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-truck" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-tty" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-tv" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-umbrella" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-universal-access" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-university" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-unlock" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-unlock-alt" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-unsorted" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-upload" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-user" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-user-circle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-user-circle-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-user-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-user-plus" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-user-secret" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-user-times" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-users" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-vcard" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-vcard-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-video-camera" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-volume-control-phone" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-volume-down" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-volume-off" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-volume-up" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-warning" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-wheelchair" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-wheelchair-alt" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-wifi" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-window-close" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-window-close-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-window-maximize" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-window-minimize" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-window-restore" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-wrench" ></i></a>
            <hr>
            <label for="">Accessibility Icons</label><br>
            <a href="javascript:void(0)"><i class="fa fa-american-sign-language-interpreting" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-asl-interpreting" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-assistive-listening-systems" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-audio-description" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-blind" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-braille" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-cc" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-deaf" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-deafness" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hard-of-hearing" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-low-vision" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-question-circle-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-sign-language" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-signing" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-tty" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-universal-access" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-volume-control-phone" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-wheelchair" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-wheelchair-alt" ></i></a>
            <hr>
            <label for="">Hand Icons</label>
            <a href="javascript:void(0)"><i class="fa fa-hand-grab-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-lizard-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-o-down" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-o-left" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-o-right" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-o-up" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-paper-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-peace-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-pointer-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-rock-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-scissors-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-spock-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-hand-stop-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thumbs-down" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thumbs-o-down" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thumbs-o-up" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-thumbs-up" ></i></a>
            <hr>
            <label for="">Transportation Icons</label><br>
            <a href="javascript:void(0)"><i class="fa fa-ambulance" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-automobile" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bicycle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-bus" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-cab" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-car" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-fighter-jet" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-motorcycle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-plane" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-rocket" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-ship" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-space-shuttle" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-subway" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-taxi" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-train" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-truck" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-wheelchair" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-wheelchair-alt" ></i></a>
            <hr>
            <label for="">Gender Icons</label>
            <a href="javascript:void(0)"><i class="fa fa-genderless" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-intersex" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-mars" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-mars-double" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-mars-stroke" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-mars-stroke-h" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-mars-stroke-v" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-mercury" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-neuter" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-transgender" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-transgender-alt" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-venus" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-venus-double" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-venus-mars" ></i></a>
            <hr>
            <label for="">File Type Icons</label><br>
            <a href="javascript:void(0)"><i class="fa fa-file" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-archive-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-audio-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-code-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-excel-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-image-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-movie-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-pdf-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-photo-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-picture-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-powerpoint-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-sound-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-text" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-text-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-video-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-word-o" ></i></a>
            <a href="javascript:void(0)"><i class="fa fa-file-zip-o" ></i></a>
            <section id="spinner">
                <hr><label>Spinner Icons</label><br>
                <a href="javascript:void(0)"><i class="fa fa-circle-o-notch" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cog" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-gear" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-refresh" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-spinner" ></i></a>
            </section>
            <section id="form-control">
                <hr><label>Form Control Icons</label><br>
                <a href="javascript:void(0)"><i class="fa fa-check-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-check-square-o" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-circle" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-circle-o" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-dot-circle-o" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-minus-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-minus-square-o" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-plus-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-plus-square-o" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-square-o" ></i></a>
            </section>
            <section id="payment">
                <hr><label>Payment Icons</label><br>
                <a href="javascript:void(0)"><i class="fa fa-cc-amex" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cc-diners-club" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cc-discover" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cc-jcb" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cc-mastercard" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cc-paypal" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cc-stripe" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cc-visa" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-credit-card" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-credit-card-alt" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-google-wallet" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-paypal" ></i></a>
            </section>
            <section id="chart">
                <hr><label>Chart Icons</label><br>
                <a href="javascript:void(0)"><i class="fa fa-area-chart" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-bar-chart" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-bar-chart-o" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-line-chart" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-pie-chart" ></i></a>
            </section>
            <section id="currency">
                <hr><label>Currency Icons</label><br>
                <a href="javascript:void(0)"><i class="fa fa-bitcoin" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-btc" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cny" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-dollar" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-eur" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-euro" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-gbp" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-gg" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-gg-circle" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-ils" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-inr" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-jpy" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-krw" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-money" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-rmb" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-rouble" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-rub" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-ruble" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-rupee" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-shekel" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-sheqel" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-try" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-turkish-lira" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-usd" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-won" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-yen" ></i></a>
            </section>
            <section id="text-editor">
                <hr><label>Text Editor Icons</label><br>
                <a href="javascript:void(0)"><i class="fa fa-align-center" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-align-justify" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-align-left" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-align-right" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-bold" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-chain" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-chain-broken" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-clipboard" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-columns" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-copy" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cut" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-dedent" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-eraser" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-file" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-file-o" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-file-text" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-file-text-o" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-files-o" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-floppy-o" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-font" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-header" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-indent" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-italic" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-link" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-list" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-list-alt" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-list-ol" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-list-ul" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-outdent" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-paperclip" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-paragraph" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-paste" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-repeat" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-rotate-left" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-rotate-right" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-save" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-scissors" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-strikethrough" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-subscript" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-superscript" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-table" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-text-height" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-text-width" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-th" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-th-large" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-th-list" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-underline" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-undo" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-unlink" ></i></a>
            </section>
            <section id="directional">
                <hr><label>Directional Icons</label><br>
                <a href="javascript:void(0)"><i class="fa fa-angle-double-down" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-angle-double-left" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-angle-double-right" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-angle-double-up" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-angle-down" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-angle-left" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-angle-right" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-angle-up" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-arrow-circle-down" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-arrow-circle-left" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-arrow-circle-o-down" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-arrow-circle-o-left" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-arrow-circle-o-right" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-arrow-circle-o-up" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-arrow-circle-right" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-arrow-circle-up" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-arrow-down" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-arrow-left" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-arrow-right" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-arrow-up" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-arrows" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-arrows-alt" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-arrows-h" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-arrows-v" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-caret-down" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-caret-left" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-caret-right" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-caret-square-o-down" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-caret-square-o-left" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-caret-square-o-right" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-caret-square-o-up" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-caret-up" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-chevron-circle-down" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-chevron-circle-left" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-chevron-circle-right" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-chevron-circle-up" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-chevron-down" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-chevron-left" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-chevron-right" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-chevron-up" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-exchange" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-hand-o-down" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-hand-o-left" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-hand-o-right" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-hand-o-up" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-long-arrow-down" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-long-arrow-left" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-long-arrow-right" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-long-arrow-up" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-toggle-down" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-toggle-left" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-toggle-right" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-toggle-up" ></i></a>
            </section>
            <section id="video-player">
                <hr><label>Video Player Icons</label><br>
                <a href="javascript:void(0)"><i class="fa fa-arrows-alt" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-backward" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-compress" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-eject" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-expand" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-fast-backward" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-fast-forward" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-forward" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-pause" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-pause-circle" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-pause-circle-o" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-play" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-play-circle" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-play-circle-o" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-random" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-step-backward" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-step-forward" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-stop" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-stop-circle" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-stop-circle-o" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-youtube-play" ></i></a>
            </section>
            <section id="brand">
                <hr><label>Brand Icons</label><br>
                <a href="javascript:void(0)"><i class="fa fa-500px" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-adn" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-amazon" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-android" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-angellist" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-apple" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-bandcamp" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-behance" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-behance-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-bitbucket" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-bitbucket-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-bitcoin" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-black-tie" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-bluetooth" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-bluetooth-b" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-btc" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-buysellads" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cc-amex" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cc-diners-club" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cc-discover" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cc-jcb" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cc-mastercard" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cc-paypal" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cc-stripe" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-cc-visa" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-chrome" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-codepen" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-codiepie" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-connectdevelop" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-contao" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-css3" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-dashcube" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-delicious" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-deviantart" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-digg" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-dribbble" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-dropbox" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-drupal" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-edge" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-eercast" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-empire" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-envira" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-etsy" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-expeditedssl" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-fa" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-facebook" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-facebook-f" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-facebook-official" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-facebook-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-firefox" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-first-order" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-flickr" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-font-awesome" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-fonticons" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-fort-awesome" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-forumbee" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-foursquare" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-free-code-camp" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-ge" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-get-pocket" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-gg" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-gg-circle" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-git" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-git-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-github" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-github-alt" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-github-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-gitlab" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-gittip" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-glide" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-glide-g" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-google" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-google-plus" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-google-plus-circle" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-google-plus-official" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-google-plus-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-google-wallet" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-gratipay" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-grav" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-hacker-news" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-houzz" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-html5" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-imdb" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-instagram" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-internet-explorer" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-ioxhost" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-joomla" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-jsfiddle" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-lastfm" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-lastfm-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-leanpub" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-linkedin" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-linkedin-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-linode" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-linux" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-maxcdn" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-meanpath" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-medium" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-meetup" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-mixcloud" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-modx" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-odnoklassniki" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-odnoklassniki-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-opencart" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-openid" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-opera" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-optin-monster" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-pagelines" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-paypal" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-pied-piper" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-pied-piper-alt" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-pied-piper-pp" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-pinterest" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-pinterest-p" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-pinterest-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-product-hunt" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-qq" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-quora" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-ra" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-ravelry" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-rebel" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-reddit" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-reddit-alien" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-reddit-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-renren" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-resistance" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-safari" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-scribd" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-sellsy" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-share-alt" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-share-alt-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-shirtsinbulk" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-simplybuilt" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-skyatlas" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-skype" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-slack" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-slideshare" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-snapchat" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-snapchat-ghost" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-snapchat-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-soundcloud" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-spotify" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-stack-exchange" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-stack-overflow" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-steam" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-steam-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-stumbleupon" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-stumbleupon-circle" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-superpowers" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-telegram" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-tencent-weibo" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-themeisle" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-trello" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-tripadvisor" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-tumblr" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-tumblr-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-twitch" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-twitter" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-twitter-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-usb" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-viacoin" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-viadeo" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-viadeo-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-vimeo" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-vimeo-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-vine" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-vk" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-wechat" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-weibo" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-weixin" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-whatsapp" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-wikipedia-w" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-windows" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-wordpress" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-wpbeginner" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-wpexplorer" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-wpforms" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-xing" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-xing-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-y-combinator" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-y-combinator-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-yahoo" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-yc" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-yc-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-yelp" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-yoast" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-youtube" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-youtube-play" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-youtube-square" ></i></a>
            </section>
            <section id="medical">
                <label></label>
                <a href="javascript:void(0)"><i class="fa fa-ambulance" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-h-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-heart" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-heart-o" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-heartbeat" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-hospital-o" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-medkit" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-plus-square" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-stethoscope" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-user-md" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-wheelchair" ></i></a>
                <a href="javascript:void(0)"><i class="fa fa-wheelchair-alt" ></i></a>
            </section>
            <hr>
            <a href="http://www.fontawesome.com.cn/faicons/" target="_blank"><?=\yii::t('app','More Icon')?></a>
        </div>
    </div>
</div>
<?php \common\widgets\JsBlock::begin()?>
<script>
    $("#icon-change").on('click',function(){
        var iconlayer=layer.open({
            type:1,
            area:['800px','900px'],
            content:$('#icon-list')
        });

        $('#icon-list').on('click','a',function(){
            layer.close(iconlayer);
            var iclass=$(this).html();
            $('#icon-show').html(iclass);
            $('#<?=Html::getInputId($model,'icon')?>').val($(iclass).attr('class'));
        });
    });

</script>
<?php \common\widgets\JsBlock::end()?>
