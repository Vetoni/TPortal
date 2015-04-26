<?php

use frontend\widgets\Menu;
use yii\helpers\Html;

$this->beginContent('@frontend/views/layouts/base.php');
?>

    <!-- Image carousel -->
    <?= $this->render('/shared/_carousel') ?>

    <!-- Content -->
    <div id="content">
        <div class="left">
            <?= $this->render('/shared/_menu') ?>
            <?= Html::img('@web/img/balls2.png') ?>
        </div>

        <div class="right">
            <?= $content ?>
        </div>

        <div class="clr"></div>
    </div>

    <!-- Footer -->
    <footer id="footer">
        <?= Html::img('@web/img/globe2.png') ?>
        <?= Menu::widget() ?>
    </footer>

<?php $this->endContent(); ?>