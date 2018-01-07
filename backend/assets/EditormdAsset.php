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
        'editormd.js',
    ];

    public $jsOptions=[
        'position' => \yii\web\View::POS_HEAD,
    ];

    public $depends=[
        'jquery'=>'backend\assets\JqueryAsset',
    ];

//    public $publishOptions=[
//        'only' => [
//            'lib',
//            'css',
//        ]
//    ];

}
