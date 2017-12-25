<?php

namespace backend\assets;

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
    ];
    public $js = [
        'js/klorofil-common.js',
    ];
    public $depends = [
        'backend\assets\JqueryAsset',
        'backend\assets\BootstrapAsset',
        'backend\assets\JquerySlimscroll',
        'backend\assets\LineariconsAsset',
        'backend\assets\FontAwesomeAsset',
        'backend\assets\JquerySlimscroll',
    ];
}
