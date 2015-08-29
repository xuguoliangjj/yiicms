<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2015/8/16
 * Time: 18:42
 */
use \yii\widgets\ActiveForm;
use \yii\helpers\Html;

$this->title = '添加角色';
$this->params['breadcrumbs'] = \backend\components\Tools::buildBreadcrumbs($this,$this->title);
?>

<div class="panel panel-default">
    <div class="panel-heading">添加角色</div>
    <div class="panel-body">
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'description')->textarea()?>
        <?= $form->field($model, 'ruleName') ?>
        <?= $form->field($model, 'data')->textarea()?>

    <div class="form-group">
        <?= Html::submitButton('添加', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>

    </div>
</div>


