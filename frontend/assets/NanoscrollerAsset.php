<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class NanoscrollerAsset extends AssetBundle
{
    public $sourcePath='@resource/frontend/nanoscroller/';
    public $css = [
        'nanoscroller.css',
    ];
    public $js = [
        'jquery.nanoscroller.min.js',
    ];
    public $depends = [
        'frontend\assets\JqueryAsset',
    ];
}
