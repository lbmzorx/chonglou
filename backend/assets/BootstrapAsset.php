<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class BootstrapAsset extends AssetBundle
{
    public $sourcePath = '@resource/admin/vendor/bootstrap/';
    public $css = [
        'css/bootstrap.min.css',
    ];
    public $js=[
        'js/bootstrap.min.js',
    ];
}
