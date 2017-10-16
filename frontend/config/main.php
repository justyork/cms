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
    'language' => 'en-US',
    'sourceLanguage' => 'en-US',
    'aliases' => [
        '@dist' => '/frontend/web/dist/'
    ],
    'components' => [
        'cart' => [
            'class' => 'frontend\components\Cart',
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '/',
            'class' => 'frontend\components\LangRequest'
        ],
        'user' => [
            'identityClass' => 'common\models\User',
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
            'class' => 'frontend\components\LangUrlManager',
            'baseUrl' => '/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/' => 'site/index',
                'cart' => 'site/cart',
                'news/<url:[\w-]+>-<id:\d+>' => 'news/get',
                'news/p-<page:\d+>' => 'news/index',
                'news' => 'news/index',
                'page/<url:[\w-]+>' => 'page/get',
            ],
        ],

    ],
    'params' => $params,
];
