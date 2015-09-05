<?php
$this->title = '路由列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php \yii\widgets\Pjax::begin()?>
    <div class="panel panel-default">
        <div class="panel-heading">路由列表</div>
        <div class="panel-body">
            <?= \xuguoliangjj\editorgridview\EditorGridView::widget([
                'dataProvider'=>$dataProvider,
                'filterModel'=>$model,
                'summary'=>'',
                'buttons'=>[
                    \yii\helpers\Html::a('新增路由',['/setting/route/create'],['class'=>'btn btn-sm btn-primary'])
                ],
                'columns'=>[
                    ['attribute'=>'name','label'=>'名称','filter'=>true],
                    ['attribute'=>'description','label'=>'简述'],
                    ['attribute'=>'createdAt','label'=>'创建时间','format'=>['date', 'php:Y-m-d']],
                    ['attribute'=>'updatedAt','label'=>'更新时间','format'=>['date', 'php:Y-m-d']],
                    ['class' => 'yii\grid\ActionColumn','template' => '{update} {delete}'],
                ]
            ]);
            ?>
        </div>
    </div>
<?php \yii\widgets\Pjax::end()?>