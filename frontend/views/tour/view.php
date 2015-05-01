<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $tour common\models\Tour */

$this->title = $tour->title;
?>

<h3 class="content-item-caption">
    <?= $this->title ?>
</h3>

<div class="content-item">
    <?= $tour->description ?>
    <p>
        <?= Html::a(Yii::t('app', 'Order tour'), Url::to(['tour/order', 'id' => $tour->nid])) ?>
    </p>
</div>

