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
        '/static/plugins/layui/css/layui.css',//这个必须先引入
        '/static/css/font.css',
        '/static/css/xadmin.css',
    ];
    public $js = [
        'https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js',
        'https://cdn.bootcss.com/blueimp-md5/2.10.0/js/md5.min.js',
        '/static/plugins/layui/layui.js',
        '/static/js/lay-sys/xadmin.js',
        '/static/js/lay-sys/cookie.js',
    ];
}
