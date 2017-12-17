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
    'default'=>'',

    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\admin\User',
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
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
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
    ],
    'timeZone' => 'Asia/Shanghai',
    'params' => $params,
];
