<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2015/9/5
 * Time: 18:15
 */

use \yii\widgets\ActiveForm;
use \yii\helpers\Html;
?>
<?php $form = ActiveForm::begin(['id' => 'assignment-form']); ?>

<?= $form->field($model, 'roles')->checkboxList($model->roles); ?>
<?= $form->field($model, 'permissions')->checkboxList($model->permissions); ?>

<div class="form-group">
    <?= Html::submitButton('添加',
        ['class' => 'btn btn-success btn-sm']) ?>
</div>
<?php ActiveForm::end(); ?>