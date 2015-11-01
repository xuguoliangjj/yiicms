<?php
$this->title = '新增规则';
$this->params['breadcrumbs'] = \backend\components\Tools::buildBreadcrumbs($this,$this->title);
?>

<div class="panel panel-default">
    <div class="panel-heading">新增规则</div>
    <div class="panel-body">
        <?= $this->render('_form',['model'=>$model])?>
    </div>
</div>