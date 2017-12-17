<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\user\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'user' => [
            'class' => 'frontend\modules\user\Module',
        ],
        'home' => [
            'class' => 'frontend\modules\home\Module',
        ],
        'article' => [
            'class' => 'frontend\modules\article\Module',
        ],
        'finance' => [
            'class' => 'frontend\modules\finance\Module',
        ],
        'product' => [
            'class' => 'frontend\modules\product\Module',
        ],
        'test' => [
            'class' => 'frontend\modules\test\Module',
        ],
        'system' => [
            'class' => 'frontend\modules\system\Module',
        ],
    ],
    'params' => $params,
];
