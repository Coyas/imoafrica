<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'fullpage/src/fullpage.css',
        'vendor/bootstrap/css/bootstrap.min.css',
        'css/index.css',
        'css/jssorlider.css',
        'css/lightbox.css',
        'css/all.css',
        'css/ionicons.min.css',
        'css/bootstrapValidator.min.css',
//        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
//        'https://use.fontawesome.com/releases/v5.7.2/css/all.css',
//        'http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css',

    ];
    public $js = [
        'vendor/jquery/jquery.min.js',
        'vendor/bootstrap/js/bootstrap.bundle.min.js',
        'js/stopExecutionOnTimeout.js',
        'js/jquery.easing.min.js',
        'js/bootstrapValidator.min.js',
//        'https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js',
//        'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js',
//        'http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js',
        'js/script.js',
        'js/jssorslider.js',
        'js/lightbox.js',
        'fullpage/vendors/scrolloverflow.min.js',
        'fullpage/dist/fullpage.extensions.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
