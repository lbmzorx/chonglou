<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'As4v8-5O_DRyHHft7_YZLRB4r08on2uw',
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'generators'=>[
            'model'=>[
                'class' => 'backend\components\gii\model\ChongGenerator',
            ],
            'crud' => [
                'class' => \backend\components\gii\crud\Generator::className(),
                'templates' => [
                    'default' => '@backend/components/gii/crud/default',
                    'yii' => '@vendor/yiisoft/yii2-gii/generators/crud/default',
                ]
            ]
        ],
    ];
}

return $config;
