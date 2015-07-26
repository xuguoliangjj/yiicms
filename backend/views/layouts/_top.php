<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
?>
<?php
NavBar::begin([
    'brandLabel' => '后台管理系统',
    'brandUrl' => Yii::$app->homeUrl,
    'innerContainerOptions'=>['class'=>'container-fluid'],
    'options' => [
        'class' => 'navbar-inverse navbar-static-top own-navbar-top',
    ],
]);
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => '登录', 'url' => ['/site/login']];
} else {
    $menuItems[] = [
        'label' => '注销 (' . Yii::$app->user->identity->username . ')',
        'url' => ['/site/logout'],
        'linkOptions' => ['data-method' => 'post']
    ];
}
if(!Yii::$app->user->isGuest) {
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $this->context->topMenu,
    ]);
}

echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();
?>