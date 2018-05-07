<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\helpers\Url;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/img-hover.css',
        'css/data-pegawai.css',
	'css/docs.css',
	'img/bs-docs-masthead-pattern.png',
    ];
    public $js = [
        'js/data-pegawai.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
