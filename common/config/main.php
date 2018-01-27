<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => '@resource/vendor/jquery/', // 屏蔽jqueryAsset
                    'js' => [
                        'jquery.min.js'
                    ],
                    'jsOptions'=>[
                        'position' => \yii\web\View::POS_HEAD,
                    ]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [
                        'css/bootstrap.min.css',
                    ],
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [
                        'js/bootstrap.min.js',
                    ],
                ],
                'yii\bootstrap\BootstrapThemeAsset' => [
                    'css' => [
                        'css/bootstrap-theme.min.css',
                    ],
                ],
            ],
        ],

    ],
    'timeZone' => 'Asia/Shanghai',
    'language'=>'zh-CN',
];
