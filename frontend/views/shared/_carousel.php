<?php
use yii\bootstrap\Carousel;
use yii\helpers\Html;

if (@Yii::$app->params["showCarousel"]) {
    echo Carousel::widget([
        'items' => [
            ['content' => Html::img('@web/img/carousel_1.jpg')],
            ['content' => Html::img('@web/img/carousel_2.jpg')],
            ['content' => Html::img('@web/img/carousel_3.jpg')],
        ],
        'controls' => [
            '<span class="glyphicon glyphicon-chevron-left"></span>',
            '<span class="glyphicon glyphicon-chevron-right"></span>',
        ],
        'options' => [
            'id' => 'image_carousel',
        ],
    ]);
}
