<?php
use frontend\widgets\Menu;
use yii\helpers\Html;


/* @var $this \yii\web\View */
/* @var $content string */

\frontend\assets\AppAsset::register($this);
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
    <header id="header">
        <img src="/img/sea.jpg" alt="">
        <img class="globe" src="/img/globe.png" alt="">
        <img class="logo" src="/img/logo.png" alt="">
        <p class="firm">"Забугор-вояж" тур-фирма</p>

        <a class="header-menu1" href="#">
            <div>Спецпредложения</div>
        </a>
        <a class="header-menu2" href="<?= \yii\helpers\Url::to(['tour/index'])?>">
            <div>Туры</div>
        </a>
        <a class="header-menu3" href="#">
            <div>Страны</div>
        </a>

        <p class="phone">тел. 8-800-000-00-00</p>

        <form action="search">
            <input type="search" placeholder="Поиск">
            <input type="submit" value="">
        </form>
    </header>

    <div class="menu-balls">
        <img src="img/balls1.png" alt="">
        <?= Menu::widget() ?>
    </div>
    <?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>