<?php

use frontend\assets\AppAsset;
use frontend\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;

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
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?= Html::csrfMetaTags() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <!-- Header -->
    <header id="header">
        <!-- Logo -->
        <?= Html::img('@web/img/globe.png', ['class' => 'globe']) ?>
        <?= Html::img('@web/img/logo.png', ['class' => 'logo']) ?>
        <p class="firm"><?= Yii::t('app', 'Foreign tour') ?></p>
        <a class="header-menu1" href="#">
            <div><?= Yii::t('app', 'Special orders') ?></div>
        </a>
        <a class="header-menu2" href="<?= Url::to(['tour/index'])?>">
            <div><?= Yii::t('app', 'Tours') ?></div>
        </a>
        <a class="header-menu3" href="#">
            <div><?= Yii::t('app', 'Regions') ?></div>
        </a>
        <p class="phone"><?= Yii::t('app', 'tel.') ?> 8-800-000-00-00</p>
        <form id="search" action="search">
            <input type="search" placeholder="<?= Yii::t('app', 'Search') ?>">
            <input type="submit" value="">
        </form>
    </header>

    <!-- Top menu -->
    <nav id="nav" role="navigation">
        <?= Html::img('@web/img/balls1.png') ?>
        <?= Menu::widget() ?>
    </nav>

    <!-- Content -->
    <?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
