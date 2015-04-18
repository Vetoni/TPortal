<?php

use common\widgets\EntityCounter;
use \yii\helpers\Url;

?>

<?php if (!Yii::$app->user->isGuest): ?>

<div class="user-panel">
    <div class="pull-left image">
        <img src="/img/user/user2-160x160.jpg" class="img-circle" alt="<?= Yii::t('app', 'User Image') ?>" />
    </div>
    <div class="pull-left info">
        <p><?= Yii::$app->user->identity->username ?></p>

        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>

<?php endif; ?>

<ul class="sidebar-menu">

    <?php
        $items = [
            [
                'type' => 'header',
                'title' => Yii::t('app', 'MAIN NAVIGATION'),
            ],
            [
                'type' => 'section',
                'class' => 'fa-dashboard',
                'title' => Yii::t('app', 'Dashboard'),
                'items' => [
                    [ 'url' => '#', 'title' => Yii::t('app', 'Get started'), 'class' => 'fa-circle-o' ],
                    [ 'url' => Url::to(['site/index']), 'title' => Yii::t('app', 'Site content'), 'class' => 'fa-circle-o' ],
                ]
            ],
            [
                'type' => 'item',
                'class' => 'fa-plane',
                'title' => Yii::t('app', 'Tours'),
                'url' => Url::to(['tour/index']),
                'extra' => [
                    'class' => 'bg-red',
                    'content' =>  EntityCounter::widget(['entity' => 'Tour']),
                ]
            ],
            [
                'type' => 'item',
                'class' => 'fa-globe',
                'title' => Yii::t('app', 'Regions'),
                'url' => Url::to(['region/index']),
                'extra' => [
                    'class' => 'bg-green',
                    'content' =>  EntityCounter::widget(['entity' => 'Region']),
                ]
            ],
            [
                'type' => 'item',
                'class' => 'fa-car',
                'title' => Yii::t('app', 'Cities'),
                'url' => Url::to(['city/index']),
                'extra' => [
                    'class' => 'bg-yellow',
                    'content' =>  EntityCounter::widget(['entity' => 'City']),
                ]
            ],
            [
                'type' => 'item',
                'class' => 'fa-table',
                'title' => Yii::t('app', 'Tour types'),
                'url' => Url::to(['tour-type/index']),
                'extra' => [
                    'class' => 'bg-blue',
                    'content' =>  EntityCounter::widget(['entity' => 'TourType']),
                ]
            ],
            [
                'type' => 'item',
                'class' => 'fa-newspaper-o',
                'title' => Yii::t('app', 'News'),
                'url' => Url::to(['news/index']),
                'extra' => [
                    'class' => 'bg-purple',
                    'content' =>  EntityCounter::widget(['entity' => 'NewsItem']),
                ]
            ],
            [
                'type' => 'header',
                'title' => Yii::t('app', 'LABELS'),
            ],
            [
                'type' => 'item',
                'class' => 'fa-circle-o text-danger',
                'title' => 'Important',
                'url' => '#',
            ],
            [
                'type' => 'item',
                'class' => 'fa-circle-o text-warning',
                'title' => 'Warning',
                'url' => '#',
            ],
            [
                'type' => 'item',
                'class' => 'fa-circle-o text-info',
                'title' => 'Information',
                'url' => '#',
            ],
        ];

        echo backend\widgets\Menu::widget(['items' => $items]);
    ?>
</ul>