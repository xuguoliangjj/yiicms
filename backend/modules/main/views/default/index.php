<?php
use yii\bootstrap\Tabs;
$this->title = '新增玩家';
$this->params['breadcrumbs'][] = ['label'=>$this->title];
?>
<div class="panel panel-default own-panel">
    <div class="panel-heading">
        <label>新增玩家</label>
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
                        'headerOptions'=>['id'=>'addPlayer'],
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

<div class="panel panel-default own-panel">
    <div class="panel-heading">
        <label>玩家在线时长</label>
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
                    'label' => '首次在线时长',
                    'content' => $this->render('part2'),
                    'active' => true
                ],
                [
                    'label' => '玩家转化率2',
                    'content' => $this->render('other2'),
                    'headerOptions' => [],

                ]
            ],
        ]);
        ?>
    </div>
</div>

