<?php

/* @var $this yii\web\View */
/* @var $model common\models\NewsItem */


$this->title = $model->title;
?>

<h3 class="content-item-caption">
    <?= $this->title ?>
</h3>

<div class="content-item">
    <?= $model->description ?>
</div>