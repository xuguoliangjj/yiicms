<?php
use yii\bootstrap\Tabs;
$this->title = '前台管理';
$this->params['breadcrumbs'][] = ['label'=>$this->title];
?>
<div class="panel panel-default own-tags">
    <div class="panel-heading">
        新增玩家
        <span class="pull-right own-toggle">
            <a class="glyphicon glyphicon-chevron-up"></a>
        </span>
        <span class="pull-right own-download">
            <a class="glyphicon glyphicon-download-alt"></a>
        </span>
    </div>
    <div class="panel-body">
        <?php
            echo Tabs::widget([
                'navType'=>'nav-pills',
                'items' => [
                    [
                        'label' => '新增与激活',
                        'content' => $this->render('part'),
                        'active' => true
                    ],
                    [
                        'label' => '玩家转化率',
                        'content' => $this->render('other'),
                        'headerOptions' => [],
                        'options' => ['id' => 'myveryownID'],
                    ]
                ],
            ]);
        ?>
    </div>
</div>

