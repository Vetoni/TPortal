<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $type common\models\TourType */

$this->title = $type->name;
?>

<h3 class="content-item-caption"><?= $this->title ?></h3>

<div class="content-item">
    <?= $type->description ?>
</div>

<?php if (count($type->children) > 0) : ?>
    <h3 class="content-item-caption">
        <?= Yii::t('app', 'Tour subtypes') ?>
    </h3>

    <?= $this->render('/shared/_grid', [
        'source' => $type->children,
        'getUrl' => function($item) { return Url::to(['tour-sub-type/view', 'pid' => $item->pid, 'tid' => $item->tid]); }
    ]) ?>

<? endif; ?>