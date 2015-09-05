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
                ['icon'=>'glyphicon glyphicon-home','label' => '主页','items' => [
                    ['label' => '新产品1', 'url' => ['/main/default']],
                    ['label' => '流行产品1', 'url' => ['/product/index2']],
                ]],
                ['icon'=>'glyphicon glyphicon-tag','label' => '产品','items' => [
                    ['label' => '新产品2', 'url' => ['/site/indsex']],
                    ['label' => '流行产品2', 'url' => ['/product/index4']],
                ]],
                ['icon'=>'glyphicon glyphicon-folder-close','label' => '新闻中心','items' => [
                    ['label' => '新产品3', 'url' => ['/product/index5']],
                    ['label' => '流行产品3', 'url' => ['/product/index6']],
                ]],
            ]
        ],

        'setting'=> ['label'=>'系统设置', 'items'=>[
                ['icon'=>'glyphicon glyphicon-user','label' => '权限管理','items' => [
                    ['label' => '用户管理', 'url' => ['/setting/user']],
                    ['label' => '角色管理', 'url' => ['/setting/roles']],
                    ['label' => '权限列表', 'url' => ['/setting/permission']],
                    ['label' => '路由列表', 'url' => ['/setting/route']],
                    ['label' => '规则列表', 'url' => ['/setting/rule']],
                ]]
            ]
        ]

    ]
];