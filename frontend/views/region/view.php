<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $region common\models\Region */
/* @var $cities array */
/* @var $form yii\widgets\ActiveForm */

$this->title = $region->name;
?>

<h3><?= $this->title ?></h3>

<?= $region->description ?>

<?php if (count($region->cities) > 0) : ?>

<h3>
    <?= Yii::t('app', 'City list') ?>
</h3>
<?= $this->render('/shared/_grid', [
    'source' => $region->cities,
    'getUrl' => function($item) { return Url::to(['city/view', 'id' => $item->cid]); }
]) ?>

<? endif; ?>