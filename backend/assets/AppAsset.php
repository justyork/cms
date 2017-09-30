<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'tpl/css/style.css',
        'tpl/css/simple-line-icons.css',
        'tpl/css/font-awesome.css',
        'tpl/bower_components/glyphicons/styles/glyphicons.css',
        'css/site.css',
    ];
    public $js = [
        'tpl/bower_components/tether/dist/js/tether.min.js',
        'tpl/bower_components/bootstrap/dist/js/bootstrap.min.js',
        'tpl/bower_components/pace/pace.min.js',
        'tpl/bower_components/chart.js/dist/Chart.min.js',
        'tpl/js/app.js',
//        'js/main.js',
//        'js/Notify.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
