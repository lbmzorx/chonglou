<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main backend application asset bundle.
 */
class LayuiAsset extends AssetBundle
{
    public $sourcePath = '@resource/layui-v2.2.5/layui/';

    public $css=[
        'css/layui.css'
    ];
    public $js = [
        'layui.js'
    ];

    public $depends=[
        'backend\assets\JqueryAsset',
    ];
}
