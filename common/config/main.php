<?php
return [
    'language'   => 'en',
    'sourceLanguage' => 'en',
    'bootstrap'           => [
        'log',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',

    'aliases' => [
        '@cars' => '/uploads/cars/',
        '@models' => '/uploads/models/',
        '@services' => '/uploads/services/',
        '@categories' => '/uploads/categories/',
        '@news' => '/uploads/news/',
        '@works' => '/uploads/works/',
        '@work_item' => '/uploads/work_item/',
        '@seo' => '/uploads/seo/',
    ],
    'components' => [

        'seo' => [
            'class' => 'common\components\Seo',
            'default_title' => 'Dcars',
            'default_description' => 'Dcars description',

        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
