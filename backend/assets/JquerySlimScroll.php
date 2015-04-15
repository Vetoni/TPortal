<?php
namespace backend\assets;

use yii\web\AssetBundle;


class JquerySlimScroll extends AssetBundle
{
    public $sourcePath = '@jquery-slimscroll';
    public $js = [
        'jquery.slimscroll.min.js'
    ];
    public $depends = [
        '\yii\web\JqueryAsset'
    ];
}
