<?php
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $type common\models\TourType */

$this->title = $type->name;
?>

<h3><?= $this->title ?></h3>

<?= $type->description ?>

<h3><?= Yii::t('app','Tours') ?></h3>

<?= $this->render('/shared/_grid', [
    'source' => $type->tours,
    'getUrl' => function($item) { return Url::to(['tour/view', 'id' => $item->nid]); }
]) ?>