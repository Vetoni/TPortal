<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $type common\models\TourType */

$this->title = $type->name;
?>

<h3><?= $this->title ?></h3>

<?= Html::img($type->imagePath) ?>
<?= $type->description ?>

<h3><?= Yii::t('app','Tours') ?></h3>
<?= $this->render('/shared/_grid', ['model' => $type->tours]) ?>