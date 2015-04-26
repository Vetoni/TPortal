<?php

use yii\helpers\Html;
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
<ul>
    <?php foreach ($city->tours as $tour) : ?>
        <li>
            <a href="<?= Url::to(['tour/view', 'id' => $tour->tid]) ?>">
                <?= Html::img($tour->imagePath) ?>
                <?= $tour->title ?>
            </a>
            <?= $tour->announce ?>
        </li>
    <?php endforeach; ?>
</ul>

<? endif; ?>