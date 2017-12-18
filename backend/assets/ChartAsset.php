<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ChartAsset extends AssetBundle
{
    public $sourcePath = '@resource/admin/vendor/chartist';
    public $css=[
        'css/chartist-custom.css',
    ];
    public $js = [
        'js/chartist.min.js'
    ];
}
