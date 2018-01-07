<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class EditormdLibAsset extends AssetBundle
{
    public $sourcePath = '@resource/admin/plugins/editor.md-master/';

    public $css=[
        'css/editormd.css',
    ];

    public $js = [
        'lib/marked.min.js',
        'lib/prettify.min.js',
        'lib/raphael.min.js',
        'lib/underscore.min.js',
        'lib/flowchart.min.js',
        'lib/jquery.flowchart.min.js',
        'lib/sequence-diagram.min.js',
    ];
}
