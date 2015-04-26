<?php

use yii\helpers\Html;
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
<ul>
    <?php foreach ($region->cities as $city) : ?>
        <li>
            <a href="<?= Url::to(['city/view', 'id' => $city->cid]) ?>">
                <?= Html::img($city->imagePath) ?>
                <?= $city->name ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<? endif; ?>