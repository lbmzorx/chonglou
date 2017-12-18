<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class JqueryAsset extends AssetBundle
{
    public $sourcePath = '@resource/admin/';

    public $js = [
        'js/jquery.min.js'
    ];

    public $jsOptions=[
        'position' => \yii\web\View::POS_HEAD,
    ];
}
