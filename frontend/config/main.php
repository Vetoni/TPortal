<?php

$config = [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'Is6LJAfRBkD0VQYsq6ebh-nVwjZi2nfX',
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
                'tours' => 'tour/index',
                'tour/<id:\d+>' => 'tour/view',
                'special' => 'tour/special',
                'regions' => 'region/index',
                'region/<id:\d+>' => 'region/view',
                'city/<id:\d+>' => 'city/view',
                'tours-type/<id:\d+>' => 'tour-type/view',
                'tours-type/<pid:\d+>/<tid:\d+>' => 'tour-sub-type/view',
                'news/<id:\d+>' => 'news/view',
            ]
        ],
    ],
    'layout' => 'two-column'
];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
