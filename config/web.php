<?php
$scm_config = require(__DIR__ . '/scm_config.php');
$params = require __DIR__ . '/params.php';
$modules    = require(__DIR__ . '/modules.php');
$db = require __DIR__ . '/db.php';
$api        = require(__DIR__ . '/api.php');
$config = [
    'id' => 'shanding',
    'name' => 'shanding',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '2XurTjNw9_rSmYJDZ3kvPjAIG4G3qrLN',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
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
           'urlManager'   => [
            'enablePrettyUrl'     => true,// 启用美化URL
            'enableStrictParsing' => false, // 是否执行严格的url解析
            'showScriptName'      => false, // 在URL路径中是否显示脚本入口文件
            'rules'               => [
                '<controller:\w+>/<id:\d+>'                                          => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'                             => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>'                                      => '<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>'                         => '<module>/<controller>/<action>',
                '<module:[\w._-]+>/<controller:[\w._-]+>/<action:[\w._-]+>/<id:\d+>' => '<module>/<controller>/<action>'
            ],
        ],
//        'session'      => [
//            'class' => 'yii\redis\Session',
//            'redis' => [
//                'hostname' => $db['sessionRedis']['hostname'],
//                'port'     => $db['sessionRedis']['port'],
//                'password' => $db['sessionRedis']['auth'],
//            ],
//        ],
        //文件缓存
        'fileCache'    => [
            'class' => 'yii\caching\FileCache',
        ],
        //redis缓存
       // 'redisCache'   => $db['redisCache'],
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'modules'    => $modules,
    'params' => $params,
];
$config['components'] = array_merge($config['components'], $api);
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
