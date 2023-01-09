<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/frontend/';
    public $baseUrl = '@web/frontend/';
    public $css = [
        "css/bootstrap.min.css",
        'https://unpkg.com/leaflet@1.9.3/dist/leaflet.css',
        "css/materialdesignicons.min.css",
        "css/style.min.css",
        "css/custom.css",
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css',
    ];
    public $js = [
        '//unpkg.com/feather-icons',
        'js/bootstrap.bundle.min.js',
        'https://unpkg.com/leaflet@1.9.3/dist/leaflet.js',
        '//unpkg.com/sweetalert/dist/sweetalert.min.js',
        'js/smooth-scroll.polyfills.min.js',
        // 'js/particles.js',
        // 'js/particles.app.js',
        'js/app.js',
    ];
    public $depends = [];
}
