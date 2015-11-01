<?php
/* @var $this yii\web\View */

$this->title = '后台管理系统';
?>
<div class="container">
    <div class="jumbotron">
        <h1><?=Yii::$app->user->identity->username?>，欢迎使用数据分析平台!</h1>
    </div>
</div>
