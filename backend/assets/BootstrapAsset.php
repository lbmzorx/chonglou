<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class BootstrapAsset extends AssetBundle
{
    public $sourcePath = '@resource/admin/css';

    public $css = [
        'bootstrap.css'
    ];
}
