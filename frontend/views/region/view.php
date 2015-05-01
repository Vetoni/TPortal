<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $region common\models\Region */
/* @var $cities array */
/* @var $form yii\widgets\ActiveForm */

$this->title = $region->name;
?>

<h3 class="content-item-caption">
    <?= $this->title ?>
</h3>

<div class="content-item">
    <?= $region->description ?>
</div>

<?php if (count($region->cities) > 0) : ?>

<div class="content-item-caption">
    <?= Yii::t('app', 'City list') ?>
</div>
<?= $this->render('/shared/_grid', [
    'source' => $region->cities,
    'getUrl' => function($item) { return Url::to(['city/view', 'id' => $item->cid]); }
]) ?>

<?php endif; ?>