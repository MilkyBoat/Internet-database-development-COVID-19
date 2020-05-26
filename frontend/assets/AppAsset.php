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
        'css/site.css',
        // 'css/home.css',
        'css/comment.css',

        'css/news.css',
       
		
      

        'css/news.css'

    ];
    public $js = [
        'js/jquery.min.js',
        // 'js/home.js',
        'app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
