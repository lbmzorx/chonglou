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
        'css/site.css',
    ];
    public $js = [

    ];
    public $depends = [

    ];
}
