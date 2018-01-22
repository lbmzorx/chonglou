<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class CommonAsset extends AssetBundle
{
    public $sourcePath='@resource/frontend/';
    public $css = [

    ];
    public $js = [

    ];
    public $depends = [
        'common\assets\JqueryAsset',
        'common\assets\BootstrapAsset',
        'common\assets\FontAwesomeAsset',
        'common\assets\NanoscrollerAsset',
    ];
}
