<?php

$params = require __DIR__ . '/params.php';
$db = file_exists(__DIR__.'/db_local.php')?
    (require __DIR__ . '/db_local.php'):
    (require __DIR__ . '/db.php');

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@tests' => '@app/tests',
    ],
    'components' => [
        'authManager'=>[
            'class'=>'yii\rbac\DbManager'
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class'=>'Swift_SmtpTransport',
                'host'=>'smtp.yandex.ru',
                'username' => 'geekbrains@onedeveloper.ru',
                'password' => '112358njkz_',
                'port' => 587,
                'encryption' => 'tls'
            ],
        ],
        'activity' => ['class'=> \app\components\ActivityComponent::class,
            'modelClass' => '\app\models\Activity'],

        'cache' => [
//            'class' => 'yii\caching\FileCache',
            'class'=>'yii\caching\MemCache',
            'useMemcached' => true
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',

        ],
    ],
    */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['*'],
    ];
}
return $config;