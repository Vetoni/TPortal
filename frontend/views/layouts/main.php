<?php

use frontend\widgets\Menu;
use common\models\TourType;
use yii\bootstrap\Carousel;
use yii\helpers\Url;

$this->beginContent('@frontend/views/layouts/base.php');
$types = TourType::getTypes()->all();
?>
    <?php
        echo Carousel::widget([
            'items' => [
                ['content' => '<img src="/img/evento-expo-in-citta-1280-x-400.jpg"/>'],
                ['content' => '<img src="/img/paraty-2-1280x400.jpg"/>'],
                ['content' => '<img src="/img/paraty-3-1280x400.jpg"/>'],
            ],
            'controls' => [
                '<span class="glyphicon glyphicon-chevron-left"></span>',
                '<span class="glyphicon glyphicon-chevron-right"></span>',
            ],
        ]);
    ?>
    <div class="content">
        <div class="left">
            <?php foreach ($types as $type) : ?>
                <a class="type" href="<?= Url::to(['tour-type/index', 'id' => $type->tid]) ?>"><?= $type->name ?></a>
                <ul class="subtype">
                    <?php foreach ($type->children as $subtype) : ?>
                        <li>
                            <a href="<?= Url::to(['tour-sub-type/index', 'id' => $subtype->tid, 'type' => $type->tid]) ?>">
                                <img src="/img/cat.png" alt=""><?= $subtype->name ?>
                            </a>
                            <p><?= $subtype->description ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endforeach; ?>
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