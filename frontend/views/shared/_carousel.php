<?php
use yii\bootstrap\Carousel;
use yii\helpers\Html;

if (@Yii::$app->params["showCarousel"]) {
    echo Carousel::widget([
        'items' => [
            ['content' => Html::img('@web/img/evento-expo-in-citta-1280-x-400.jpg')],
            ['content' => Html::img('@web/img/paraty-2-1280x400.jpg')],
            ['content' => Html::img('@web/img/paraty-3-1280x400.jpg')],
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
