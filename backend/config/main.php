<?php

$config = [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'k-FnzSMT5_2FRK_c_yHVf8VbnaNwZFmj',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
            'rules' => [
                '/' => 'site/index',

                'region' => 'region/index',
                'region/update/<id:\d+>' => 'region/update',
                'region/delete/<id:\d+>' => 'region/delete',

                'city' => 'city/index',
                'city/update/<id:\d+>' => 'city/update',
                'city/delete/<id:\d+>' => 'city/delete',

                'tour-type' => 'tour-type/index',
                'tour-type/update/<id:\d+>' => 'tour-type/update',
                'tour-type/delete/<id:\d+>' => 'tour-type/delete',

                'tour' => 'tour/index',
                'tour/update/<id:\d+>' => 'tour/update',
                'tour/delete/<id:\d+>' => 'tour/delete',

                'news' => 'news/index',
                'news/update/<id:\d+>' => 'news/update',
                'news/delete/<id:\d+>' => 'news/delete',
            ]
        ],
    ],
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;