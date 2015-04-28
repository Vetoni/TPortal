<?php


return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=tportal',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'i18n' => [
            'translations' => [
                'app'=>[
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath'=>'@common/messages',
                ],
                '*'=> [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath'=>'@common/messages',
                    'fileMap'=>[
                        'common'=>'common.php',
                        'backend'=>'backend.php',
                        'frontend'=>'frontend.php',
                    ]
                ],
                /* Uncomment this code to use DbMessageSource
                 '*'=> [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceMessageTable'=>'{{%i18n_source_message}}',
                    'messageTable'=>'{{%i18n_message}}',
                    'enableCaching' => true,
                    'cachingDuration' => 3600
                ],
                */

            ],
        ],
        'urlManager'=>[
            'class'=>'yii\web\UrlManager',
            'enablePrettyUrl'=>true,
            'showScriptName'=>false,
        ],
        'fileStorage' => [
            'class' => 'trntv\filekit\Storage',
            'baseUrl' => '@storageUrl',
            'filesystem'=> [
                'class' => 'common\components\LocalFilesystemBuilder',
                'path' => '@storage/files'
            ]
        ],
    ],

    'params' => require(__DIR__ . '/params.php'),
];
