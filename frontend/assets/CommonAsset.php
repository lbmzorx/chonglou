<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class CommonAsset extends AssetBundle
{
    public $sourcePath='@resource/frontend/';
    public $css = [
        'css/site.css',
    ];
    public $js = [

    ];
    public $depends = [
        'yii\web\JqueryAsset',
//        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapThemeAsset',
        'common\assets\FontAwesomeAsset',
        'common\assets\NanoscrollerAsset',
    ];
}
