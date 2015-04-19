<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

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
<?php echo Html::beginTag('body', ['class' => 'skin-green']) ?>
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="<?= Yii::getAlias('@frontendUrl') ?>" class="logo">
            <strong><?= Yii::t('app', 'Foreign tour') ?></strong>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only"><?= Yii::t('app', 'Toggle navigation') ?></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu"><?= $this->render('/shared/_user_dropdown') ?></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <?= $this->render('/shared/_sidebar') ?>
        </section>
    </aside>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?= $this->title ?>
            </h1>
            <?=
                Breadcrumbs::widget([
                    'homeLink' => [
                        'label' => Yii::t('app', 'Dashboard'),
                        'url' => Yii::$app->homeUrl,
                    ],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
            ?>

        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-body">
                    <?= $content ?>
                </div>
            </div>
        </section>
    </div>
</div>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
