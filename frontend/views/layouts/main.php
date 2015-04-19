<?php

use frontend\widgets\Menu;

$this->beginContent('@frontend/views/layouts/base.php');
?>
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
            <?= $content ?>
        </div>

        <div class="clr"></div>
    </div>
    <footer id="footer">
        <img src="img/globe2.png" alt="">
        <?= Menu::widget() ?>
    </footer>
<?php $this->endContent(); ?>