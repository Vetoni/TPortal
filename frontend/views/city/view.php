<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $city common\models\City */

$this->title = $city->name;
?>

<h3><?= $this->title ?></h3>

<?= $city->description ?>

<?php if (count($city->tours) > 0) : ?>

<h3>
    <?= Yii::t('app', 'Tours') ?>
</h3>

<?= $this->render('/shared/_grid', [
    'source' => $city->tours,
    'getUrl' => function($item) { return Url::to(['tour/view', 'id' => $item->nid]); }
]) ?>

<? endif; ?>