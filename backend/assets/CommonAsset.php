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
        'css/style.css',
        'css/loader-style.css',
        'css/bootstrap.css',
        'js/progress-bar/number-pb.css',
    ];
    public $js = [
        'js/preloader.js',
        'js/bootstrap.js',
        'js/app.js',
        'js/load.js',
        'js/main.js',
        'js/chart/jquery.flot.js',
        'js/chart/jquery.flot.resize.js',
        'js/chart/realTime.js',
        'js/speed/canvasgauge-coustom.js',
        'js/countdown/jquery.countdown.js',
        'js/jhere-custom.js',
        'js/adminMain.js',
    ];
    public $depends = [
        'backend\assets\JqueryAsset',
        'backend\assets\Progressbas',
    ];
}
