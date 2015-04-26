<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $type common\models\TourType */

$this->title = $type->name;
?>

<h3><?= $this->title ?></h3>

<?= Html::img($type->imagePath) ?>
<?= $type->description ?>

<?php if (count($type->children) > 0) : ?>
    <h3>
        <?= Yii::t('app', 'Tour subtypes') ?>
    </h3>
    <ul>
        <?php foreach ($type->children as $subtype) : ?>
            <li>
                <a href="<?= Url::to(['tour-sub-type/view', 'pid' => $type->tid, 'tid' => $subtype->tid]) ?>">
                    <?= Html::img($subtype->imagePath) ?>
                    <?= $subtype->name ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

<? endif; ?>