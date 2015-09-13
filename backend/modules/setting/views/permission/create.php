<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2015/9/5
 * Time: 18:15
 */
$this->title = '角色授权';
$this->params['breadcrumbs'] = \backend\components\Tools::buildBreadcrumbs($this,$this->title);
?>

<div class="panel panel-default">
    <div class="panel-heading"><?= $this->title?></div>
    <div class="panel-body">
        <?= $this->render('_form',[
            'model'=>$model
        ])?>
    </div>
</div>