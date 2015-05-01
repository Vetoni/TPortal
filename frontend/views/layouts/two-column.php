<?php

use yii\helpers\Html;

?>
<?php $this->beginContent('@frontend/views/layouts/base.php'); ?>
    <!-- Content wrapper -->
    <div class="content-wrapper">

        <!-- Left menu -->
        <div class="left-menu">
            <?= $this->render('/shared/_menu') ?>
            <?= Html::img('@web/img/balls2.png') ?>
        </div>

        <!-- Image carousel -->
        <?= $this->render('/shared/_carousel') ?>

        <!-- Content -->
        <div class="content">
            <?= $content ?>
        </div>

        <div class="clr"></div>
    </div>
<?php $this->endContent(); ?>