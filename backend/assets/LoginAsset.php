<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class LoginAsset extends AssetBundle
{
    public $sourcePath = '@resource/admin';

    public $css = [
        'css/loader-style.css',
        'css/signin.css',
        'css/bootstrap.css',
    ];

}
