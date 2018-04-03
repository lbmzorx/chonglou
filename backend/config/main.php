<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'defaultRoute'=>'home/default/index',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\admin\Admin',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => '/site/error',
        ],

        'i18n' => [
            'translations' => [//多语言包设置
                'app*' => [
                    'class' => yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@backend/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'app.php',
                        'error' => 'error.php',
                    ],
                ],
                'menu' => [
                    'class' => yii\i18n\PhpMessageSource::className(),
                    'basePath' => '@backend/messages',
                    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'app' => 'menu.php',
                    ],
                ],
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'upload/<index:[\w\d]+(/[\w\d]+)*\.(png|jpg|jpeg)>'=>'upload/index',
                '<controller:\w+>'=>'<controller>/index',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>.<id:\d+>'=>'<controller>/<action>',
                '<module:\w+>/<controller:\w+>'=>'<module>/<controller>/index',
                '<module:\w+>'=>'<module>/default/index',
                '<module:\w+>/<controller:\w+>/<id:\d+>'=>'<module>/<controller>/index',
                '<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>'=>'<module>/<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>/<page:\d+>/<per-page:\d+>'=>'<module>/<controller>/<action>',
            ],
        ],
        'formatter' => [
            'datetimeFormat' => 'y-M-d H:i:s',
        ],

    ],
    'modules' => [
        'home' => [
            'class' => 'backend\modules\home\Module',
        ],
        'user' => [
            'class' => 'backend\modules\user\Module',
        ],
        'product' => [
            'class' => 'backend\modules\product\Module',
        ],
        'finance' => [
            'class' => 'backend\modules\finance\Module',
        ],
        'article' => [
            'class' => 'backend\modules\article\Module',
        ],
        'system' => [
            'class' => 'backend\modules\system\Module',
        ],
        'test' => [
            'class' => 'backend\modules\test\Module',
        ],
        'setting' => [
            'class' => 'backend\modules\setting\Module',
        ],
        'log' => [
            'class' => 'backend\modules\log\Module',
        ],
        'auth' => [
            'class' => 'backend\modules\auth\Module',
        ],
        'maintain' => [
            'class' => 'backend\modules\maintain\Module',
        ],
    ],

    'params' => $params,
    'language'=>'zh-CN',
];
