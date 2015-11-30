<?php
use yii\bootstrap\Tabs;
$this->title = '新增玩家';
$this->params['breadcrumbs'][] = ['label'=>$this->title];
?>
<div class="panel panel-default own-panel">
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
        <?= Tabs::widget([
                'navType'=>'nav-pills',
                'items' => [
                    [
                        'label' => '新增与激活',
                        'content' => $this->render('part'),
                        'headerOptions' => ['id'=>'addPlayer'],
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
        新增玩家2
        <span class="pull-right own-toggle">
            <a class="glyphicon glyphicon-chevron-up"></a>
        </span>
        <span class="pull-right own-download">
            <a class="glyphicon glyphicon-download-alt"></a>
        </span>
    </div>
    <div class="panel-body">
        <?= Tabs::widget([
            'navType'=>'nav-pills',
            'items' => [
                [
                    'label' => '新增与激活2',
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