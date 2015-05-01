<?php

/* @var $this yii\web\View */
/* @var $model frontend\models\OrderForm */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<?php if ($model->emailSent) : ?>

    <h3 class="content-item-caption"><?= Yii::t('app', 'Your request is successfully sent!') ?></h3>
    <div class="content-item">
        <p><?= Yii::t('app', 'Our manager will contact you soon.') ?></p>
        <p><?= Html::a(Yii::t('app', 'Go home'), Url::home()) ?></p>
    </div>

<?php else: ?>

    <div class="content-item">

        <?php $form = ActiveForm::begin() ?>

        <?= $form->field($model, 'name') ?>

        <?= $form->field($model, 'surname') ?>

        <?= $form->field($model, 'address') ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'phone') ?>

        <?= Html::submitButton(Yii::t('app', 'Order')) ?>

        <?php ActiveForm::end(); ?>

    </div>

<?php endif; ?>

