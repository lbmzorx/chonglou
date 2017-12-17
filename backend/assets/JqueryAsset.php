<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class JqueryAsset extends AssetBundle
{
    public $sourcePath = '@resource/admin/js';

    public $js = [
        'jquery.min.js'
    ];
}
