<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class EditormdAsset extends AssetBundle
{
    public $sourcePath = '@resource/admin/plugins/editor.md-master/';

    public $css=[
        'css/editormd.css',
    ];

    public $js = [
        'editormd.min.js',
    ];

    public $depends=[
        'jquery'=>'backend\assets\JqueryAsset',
    ];
}
