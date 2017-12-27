<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class LayerAsset extends AssetBundle
{
    public $sourcePath = '@resource/admin/vendor/layer';

    public $js = [
        'layer.js'
    ];

    public $jsOptions=[
        'position'=>View::POS_END,
    ];
}
