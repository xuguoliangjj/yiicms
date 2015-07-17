<?php
/**
 * Created by PhpStorm.
 * User: xuguoliang
 * Date: 2015/7/11
 * Time: 2:06
 */

return [
    'menu'=>[
        'fronted'=> ['label'=>'前台管理','items'=>[
                ['label' => '主页', 'url' => ['#'],'items' => [
                    ['label' => '新产品1', 'url' => ['site/index']],
                    ['label' => '流行产品1', 'url' => ['product/index2']],
                ]],
                ['label' => '产品', 'url' => ['product/index'],'items' => [
                    ['label' => '新产品2', 'url' => ['product/index']],
                    ['label' => '流行产品2', 'url' => ['product/index4']],
                ]],
                ['label' => '新闻中心', 'url' => ['site/login'],'items' => [
                    ['label' => '新产品3', 'url' => ['product/index5']],
                    ['label' => '流行产品3', 'url' => ['product/index6']],
                ]],
            ]
        ],

        'setting'=> ['label'=>'系统设置', 'items'=>[
                ['label' => '系统设置', 'url' => ['#'],'items' => [
                    ['label' => '系统设置1', 'url' => ['site/setting']],
                    ['label' => '系统设置2', 'url' => ['cc/cc']],
                ]]
            ]
        ]
    ]
];