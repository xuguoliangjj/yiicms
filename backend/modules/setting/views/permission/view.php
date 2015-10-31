<?php
$this->title = '修改权限';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default">
    <div class="panel-heading">修改权限</div>
    <div class="panel-body">
        <?= $this->render('_auth_permission',['model'=>$model,'result'=>$result])?>
    </div>
</div>
