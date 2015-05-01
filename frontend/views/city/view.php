<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $city common\models\City */

$this->title = $city->name;
?>

<div class="content-item-caption">
    <?= $this->title ?>
</div>

<div class="content-item">
    <?= $city->description ?>
</div>

<?php if (count($city->tours) > 0) : ?>

<div class="content-item-caption">
    <?= Yii::t('app', 'Tours') ?>
</div>

<?= $this->render('/shared/_grid', [
    'source' => $city->tours,
    'getUrl' => function($item) { return Url::to(['tour/view', 'id' => $item->nid]); }
]) ?>

<?php endif; ?>