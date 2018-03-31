<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [//多语言包设置
                'model' => [
                    'class' => yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@common/messages',
//                    'sourceLanguage' => 'zh-CN',
                ],
            ],
        ],
        'authManager' => [
            'class' => yii\rbac\DbManager::className(),
        ],
        'webSets' => [
            'class' => \common\config\WebSets::className(),
        ],
        'mailer' => [//邮箱发件人配置，会被main-local.php以及后台管理页面中的smtp配置覆盖
            'class' => yii\swiftmailer\Mailer::className(),
            'viewPath' => '@common/mail',
            'useFileTransport' => false,//false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.163.com',  //每种邮箱的host配置不一样
                'username' => 'lbmzorx@163.com',
                'password' => 'H2ja92iz820mo2ul',
                'port' => '586',
                'encryption' => 'tls',
            ],
            'messageConfig' => [
                'charset' => 'UTF-8',
                'from' => ['admin@feehi.com' => 'Feehi CMS robot ']
            ],
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
//    'language'=>'zh-CN',
];
