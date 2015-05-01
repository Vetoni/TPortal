<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $regions array */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'All regions');

?>
<h3 class="content-item-caption"><?= $this->title ?></h3>
<?= $this->render('/shared/_grid', [
    'source' => $regions,
    'getUrl' => function($item) { return Url::to(['region/view', 'id' => $item->rid]); }
]) ?>
