<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class JquerySlimscroll extends AssetBundle
{
    public $sourcePath = '@resource/admin/vendor/jquery-slimscroll/';
    public $js=[
        'jquery.slimscroll.min.js',
    ];
}
