<?php
use \yii\helpers\Html;
$this->title = '系统设置';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php \yii\widgets\Pjax::begin(); ?>
<div class="panel panel-default">
    <div class="panel-heading">用户管理</div>
    <div class="panel-body">
        <?php
        echo \xuguoliangjj\editorgridview\EditorGridView::widget([
            'dataProvider'=>$dataProvider,
            'filterPosition'=>'header',
            'filterModel'=>$model,
            'summary'=>'',
            'columns'=>[
                ['class' => 'yii\grid\CheckboxColumn'],
                ['attribute'=>'id','label'=>'序列'],
                //<a href="#" id="username" data-type="text" data-pk="1" data-url="/post" data-title="Enter username">superuser</a>
                ['attribute'=>'username','format'=>['raw'],'editable'=>['editor',function($model,$key,$index,$column){
                    return [
                        'data-type'=>'text',
                        'data-pk'=>$model->id,
                        'data-url'=>\yii\helpers\Url::to(['/setting/user/change-name'])
                    ];
                }],'filter'=>true],
                ['attribute'=>'email'],
                ['attribute'=>'created_at','label'=>'创建时间','format'=>['raw'],'editable'=>['editor',function($model,$key,$index,$column){
                    return [
                        'data-type'=>'date',
                        'data-pk'=>$model->id,
                        'data-url'=>\yii\helpers\Url::to(['/setting/user/change-time'])
                    ];
                }],'value'=>function($model,$key,$index,$column){
                    return date('Y-m-d',$model->created_at);
                }],
                ['attribute'=>'updated_at','label'=>'修改时间','value'=>function($model){return $model->updated_at;}],
                ['class' => 'yii\grid\ActionColumn']
            ]
        ]);

        ?>
    </div>
</div>

<?php \yii\widgets\Pjax::end(); ?>