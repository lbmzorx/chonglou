<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class CommonAsset extends AssetBundle
{
    public $sourcePath='@resource/admin/';
    public $css = [
        'css/main.css',
        'css/demo.css',
        'css/style.css',
    ];
    public $js = [
        'js/klorofil-common.js',
    ];
    public $depends = [
        'frontend\assets\JqueryAsset',
        'frontend\assets\FontAwesomeAsset',
        'frontend\assets\NanoscrollerAsset',
    ];
}
