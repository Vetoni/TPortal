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

<h3 class="content-item-caption"><?= Yii::t('app','Tours') ?></h3>

<?= $this->render('/shared/_grid', [
    'source' => $type->tours,
    'getUrl' => function($item) { return Url::to(['tour/view', 'id' => $item->nid]); }
]) ?>