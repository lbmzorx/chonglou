<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@resource/admin/';
    public $css=[
        'css/font-awesome.min.css',
    ];
}
