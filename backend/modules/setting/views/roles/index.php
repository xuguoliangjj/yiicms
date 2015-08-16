<?php
$this->title = '角色管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php \yii\widgets\Pjax::begin(); ?>
    <div class="panel panel-default">
        <div class="panel-heading">用户管理</div>
        <div class="panel-body">
            <?php
            echo \xuguoliangjj\editorgridview\EditorGridView::widget([
                'dataProvider'=>$dataProvider,
                'filterModel'=>$model,
                'summary'=>'',
                'buttons'=>[
                    \yii\helpers\Html::a('添加角色',['/setting/roles/create'],['class'=>'btn btn-sm btn-primary']),
                ],
                'columns'=>[
                    ['attribute'=>'name','label'=>'名称','filter'=>true],
                    ['attribute'=>'description','label'=>'简述'],
                    ['attribute'=>'createdAt','label'=>'创建时间','format'=>['date', 'php:Y-m-d']],
                    ['attribute'=>'updatedAt','label'=>'更新时间','format'=>['date', 'php:Y-m-d']],
                    ['class' => 'yii\grid\ActionColumn','template' => '{view}'],
                ]
            ]);

            ?>
        </div>
    </div>
<?php \yii\widgets\Pjax::end(); ?>