<?php

$params = require __DIR__ . '/params.php';
$db = file_exists(__DIR__.'/db_local.php')?
    (require __DIR__ . '/db_local.php'):
    (require __DIR__ . '/db.php');

$config = [
    'id' => 'basic',
    'language' => 'ru_RU',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'hGjZpICwDvrgPEHg1oVQefu1w35NPgD9',
        ],
        'formatter'=>[
            'dateFormat' => 'php:d.m.Y'
        ],
        'authManager'=>[
            'class'=>'yii\rbac\DbManager'
        ],
        'activity' => ['class'=> \app\components\ActivityComponent::class],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'rbac'=>['class'=>\app\components\RbacComponent::class],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'auth'=>['class' => \app\components\AuthComponent::class],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
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