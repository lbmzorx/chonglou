<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $sourcePath = '@resource/admin';

    public $css = [
        'css/loader-style.css',
        'css/main.css',
        'vendor/font-awesome/css/font-awesome.min.css',
        'vendor/linearicons/style.css',
        'css/demo.css',
    ];

    public $depends=[
        'yii\bootstrap\BootstrapAsset',
        '\common\assets\JsencryptAsset',
    ];
}
