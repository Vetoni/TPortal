<?php

namespace backend\assets;

use yii\web\AssetBundle;

class AdminLte extends AssetBundle
{
    public $sourcePath = '@admin-lte';
    public $js = [
        'js/app.min.js'
    ];
    public $css = [
        'css/AdminLTE.min.css',
        'css/skins/_all-skins.min.css'
    ];
    public $depends = [
        '\yii\web\JqueryAsset',
        '\yii\jui\JuiAsset',
        '\yii\bootstrap\BootstrapPluginAsset',
        'backend\assets\FontAwesome',
        //'backend\assets\JquerySlimScroll'
    ];
}
