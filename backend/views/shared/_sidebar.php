<?php

use common\widgets\TourCountWidget;
use \yii\helpers\Url;

?>
<div class="user-panel">
    <div class="pull-left image">
        <img src="/img/user/user2-160x160.jpg" class="img-circle" alt="Yii::t('app', 'User Image') ?>" />
    </div>
    <div class="pull-left info">
        <p>Alexander Pierce</p>

        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>
<ul class="sidebar-menu">
    <li class="header"><?= Yii::t('app', 'MAIN NAVIGATION') ?></li>
    <li class="active treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span><?= Yii::t('app', 'Dashboard') ?></span> <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="active">
                <a href="#"><i class="fa fa-circle-o"></i><?= Yii::t('app', 'Get started') ?></a>
            </li>
            <li>
                <a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-circle-o"></i><?= Yii::t('app', 'Site content') ?></a>
            </li>
        </ul>
    </li>
    <li>
        <a href="<?= Url::to('/tour/index') ?>">
            <i class="fa fa-plane"></i>
            <small class="label pull-right bg-green">
                <?= TourCountWidget::widget() ?>
            </small>
            <?= Yii::t('app', 'Tours') ?>
        </a>
    </li>
    <li>
        <a href="<?= Url::to(['/region/index']) ?>">
            <i class="fa fa-globe"></i><?= Yii::t('app', 'Regions') ?>
        </a>
    </li>
    <li>
        <a href="<?= Url::to('/city/index') ?>">
            <i class="fa fa-car"></i><?= Yii::t('app', 'Cities') ?>
        </a>
    </li>
    <li>
        <a href="<?= Url::to('/tour-type/index') ?>">
            <i class="fa fa-table"></i><?= Yii::t('app', 'Tour types') ?>
        </a>
    </li>
    <li class="header"><?= Yii::t('app', 'LABELS') ?></li>
    <li><a href="#"><i class="fa fa-circle-o text-danger"></i> Important</a></li>
    <li><a href="#"><i class="fa fa-circle-o text-warning"></i> Warning</a></li>
    <li><a href="#"><i class="fa fa-circle-o text-info"></i> Information</a></li>
</ul>