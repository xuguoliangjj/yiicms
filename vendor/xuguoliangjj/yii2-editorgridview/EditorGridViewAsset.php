<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/7/27
 * Time: 13:11
 */
namespace xuguoliangjj\editorgridview;

use yii\web\AssetBundle;

class EditorGridViewAsset extends AssetBundle
{
    public $sourcePath = '@xuguoliangjj/editorgridview/assets/bootstrap3-editable';

    public $css = [
        'css/bootstrap-editable.css'
    ];
    public $js = [
        'js/bootstrap-editable.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\grid\GridViewAsset'
    ];
}