<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model array */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'All regions');

?>
<h3><?= $this->title ?></h3>
<ul>
<?php foreach ($model as $region) : ?>
<li>
    <a href="<?= Url::to(['region/view', 'id' => $region->rid]) ?>">
        <?= Html::img($region->imagePath) ?>
        <?= $region->name ?>
    </a>
</li>
<?php endforeach; ?>
</ul>