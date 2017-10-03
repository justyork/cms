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
        'dist/css/style.css',
        'dist/css/simple-line-icons.css',
        'dist/css/font-awesome.css',
        'dist/bower_components/glyphicons/styles/glyphicons.css',
        'css/site.css',
    ];
    public $js = [
        'dist/bower_components/tether/dist/js/tether.min.js',
        'dist/bower_components/bootstrap/dist/js/bootstrap.min.js',
        'dist/bower_components/pace/pace.min.js',
//        'dist/bower_components/chart.js/dist/Chart.min.js',
        'dist/js/app.js',
//        'js/main.js',
//        'js/Notify.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
