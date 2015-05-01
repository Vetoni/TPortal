<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $page common\models\ContentPage */
/* @var $model frontend\models\FeedbackForm */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'Feedback page');
?>

<div class="content-item">
<?= $page->description ?>

<?php if ($model->emailSent) : ?>

    <h3><?= Yii::t('app', 'Thank you for the feedback!') ?></h3>
    <p><?= Html::a(Yii::t('app', 'Go home'), Url::home()) ?></p>

<?php else: ?>

    <?php $form = ActiveForm::begin() ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'message')->widget(
        \yii\imperavi\Widget::className(),
        [
            'options' => [
                'minHeight' => 400,
                'maxHeight' => 400,
                'buttonSource' => true,
                'convertDivs' => false,
                'removeEmptyTags' => false,
            ]
        ]
    ) ?>

    <?= Html::submitButton(Yii::t('app', 'Send')) ?>

    <?php ActiveForm::end(); ?>

<?php endif; ?>
</div>