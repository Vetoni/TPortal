<?php
use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\components\MenuWidget;

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
    <link rel="stylesheet" href="css/main.css">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
</head>
<body>
    <header id="header">
        <img src="img/sea.jpg" alt="">
        <img class="globe" src="img/globe.png" alt="">
        <img class="logo" src="img/logo.png" alt="">
        <p class="firm">"Забугор-вояж" тур-фирма</p>

        <a class="header-menu1" href="#">
            <div>Спецпредложения</div>
        </a>
        <a class="header-menu2" href="#">
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
        <ul class="menu-main">
            <li><a class="nav-ico1" href="">Главная</a></li>
            <li><a class="nav-ico2" href="">Новости</a></li>
            <li><a class="nav-ico3" href="">Услуги</a></li>
            <li><a class="nav-ico4" href="">Отзывы</a></li>
            <li><a class="nav-ico5" href="">Вопросы и ответы</a></li>
            <li><a class="nav-ico6" href="">Контакты</a></li>
        </ul>
    </div>

    <img class="presentation" src="img/presentation.jpg" alt="">


    <div class="content">
        <div class="left">

            <a class="type" href="">Заголовок 1 уровня 1</a>
            <ul class="subtype">
                <li>
                    <a href=""><img src="img/cat.png" alt="">Тур1</a>
                    <p>Немного о туре. Описание тура </p>
                </li>
                <li>
                    <a href=""><img src="img/cat.png" alt="">Тур2</a>
                    <p>Описание</p>
                </li>
                <li>
                    <a href=""><img src="img/cat.png" alt="">Тур3</a>
                    <p>Описание</p>
                </li>
            </ul>

            <a class="type" href="">Заголовок 1 уровня 2</a>
            <ul class="subtype">
                <li>
                    <a href=""><img src="img/cat.png" alt="">тур1</a>
                    <p>Описание</p>
                </li>
                <li>
                    <a href=""><img src="img/cat.png" alt="">тур2</a>
                    <p>Описание</p>
                </li>
                <li>
                    <a href=""><img src="img/cat.png" alt="">тур3</a>
                    <p>Описание</p>
                </li>
            </ul>
            <img src="img/balls2.png" alt="">
        </div>

        <div class="right">
            <a class="content-item" href="">О Компании</a>
            <p> «О компании» - содержит краткую информацию раздела со ссылкой  «О компании» - содержит краткую информацию раздела со ссылкой  «О компании» - содержит краткую информацию раздела со ссылкой  «О компании» - содержит краткую информацию раздела со ссылкой </p>

            <a class="content-item" href="">Новости</a>
            <div class="new">
                <a href=""><img src="img/new.jpg" alt=""></a>
                <h3><a href="">Заголовок новости</a></h3>
                <p>Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости </p>
                <a class="more" href="">Читaть далее</a>
            </div>
            <div class="clr"></div>

            <div class="new">
                <a href=""><img src="img/new.jpg" alt=""></a>
                <h3><a href="">Заголовок новости</a></h3>
                <p>Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости </p>
                <a class="more" href="">Читaть далее</a>
            </div>
            <div class="clr"></div>

            <div class="new">
                <a href=""><img src="img/new.jpg" alt=""></a>
                <h3><a href="">Заголовок новости</a></h3>
                <p>Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости Новости </p>
                <a class="more" href="">Читaть далее</a>
            </div>

        </div>

        <div class="clr"></div>
        </div>



    <footer id="footer">
        <img src="img/globe2.png" alt="">
        <ul class="menu-bottom">
            <li><a class="nav-ico1" href="">Главная</a></li>
            <li><a class="nav-ico2" href="">Новости</a></li>
            <li><a class="nav-ico3" href="">Услуги</a></li>
            <li><a class="nav-ico4" href="">Отзывы</a></li>
            <li><a class="nav-ico5" href="">Вопросы и ответы</a></li>
            <li><a class="nav-ico6" href="">Контакты</a></li>
        </ul>
    </footer>
</body>
</html>
