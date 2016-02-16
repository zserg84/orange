<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 28.09.15
 * Time: 13:55
 */

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAssetConfiguration extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'scripts/bootstrap/bootstrap.js',
        'scripts/media/carousel-top-bar.js',
        'scripts/media/carousel-start-page.js',
        'scripts/media/wt-mobile-menu.js',
        'scripts/configuration.js',
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_END];
} 