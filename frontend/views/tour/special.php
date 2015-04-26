<?php

/* @var $this yii\web\View */
/* @var $tours array */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'Special orders');

?>
<h3><?= $this->title ?></h3>
<?= $this->render('/shared/_grid', ['model' => $tours]) ?>