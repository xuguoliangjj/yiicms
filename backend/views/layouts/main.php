<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
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

    <div class="container-fluid own-container-fluid">
        <div class="row hidden-xs">
            <div class="col-xs-12 col-sm-2 own-search-bar">
                <div class="input-group input-group" style="padding:10px;">
                    <input type="text" class="form-control" placeholder="搜索......" aria-describedby="sizing-addon1">
                    <span class="input-group-addon btn" id="sizing-addon1"><span class="glyphicon glyphicon-search"></span></span>
                </div>
            </div>
            <div class="col-xs-12 col-sm-10">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'options' => ['class' => 'breadcrumb','style'=>'margin:13px 0px 0px;'],
                    'homeLink' => [
                        'label' => '首页',  // required
                        'url' => '/',      // optional, will be processed by Url::to()
                        'template' => "<li>{link}</li>\n", // optional, if not set $this->itemTemplate will be used
                    ]
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-2 own-menu-bar">
                <?php if (!Yii::$app->user->isGuest):?>
                <nav class="sidebar-nav">
                    <?= Menu::widget([
                        'options'=>["id"=>"menu"],
                        'linkTemplate'=>'<a href="{url}">{label}</a>',  //<i class="glyphicon glyphicon-chevron-left pull-right"></i>
                        'items' => $this ->context -> leftMenu
                    ]);?>
                </nav>
                <?php endif;?>
            </div>
            <div class="col-xs-12 col-sm-10">
                <?= $content ?>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
