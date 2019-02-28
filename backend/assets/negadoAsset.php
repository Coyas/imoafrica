<?php
/**
 * Created by PhpStorm.
 * User: coyas
 * Date: 28-02-2019
 * Time: 15:46
 */

namespace backend\assets;


use yii\web\AssetBundle;

class negadoAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css'
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}