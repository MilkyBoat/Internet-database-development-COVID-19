<?php
/**
 * Team:布里啾啾迪布里多,NKU
 * coding by huangjingzhi 1810729,20200505
 */
namespace frontend\assets;


use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class TagsInputAsset extends AssetBundle
{
    public $basePath='@webroot/tagsinput';
    public $baseUrl='@web/tagsinput';
    public $css=[
        'tagsinput,css'
    ];
    public $js=[
        'tagsinput.js'
    ];
    public $depends=[
        JqueryAsset::class
    ];
}