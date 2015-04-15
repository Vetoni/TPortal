<?php

use common\widgets\CitiesWidget;
use common\widgets\TourSubTypesWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Tour */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tour-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'tid')->widget(TourSubTypesWidget::className()) ?>

    <?= $form->field($model, 'cid')->widget(CitiesWidget::className()) ?>

    <?= $form->field($model, 'status')->widget(\common\widgets\NodeStatusWidget::className()) ?>

    <?= $form->field($model, 'image')->widget(
        \trntv\filekit\widget\Upload::className(),
        [
            'url' => [Url::to(['media/upload'])],
        ]);
    ?>

    <?= $form->field($model, 'announce')->widget(
        \yii\imperavi\Widget::className(),
        [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options' => [
                'minHeight' => 400,
                'maxHeight' => 400,
                'buttonSource' => true,
                'convertDivs' => false,
                'removeEmptyTags' => false,
                'imageUpload' => Url::to(['media/upload-imperavi']),
            ]
        ]
    ) ?>

    <?= $form->field($model, 'description')->widget(
        \yii\imperavi\Widget::className(),
        [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options' => [
                'minHeight' => 400,
                'maxHeight' => 400,
                'buttonSource' => true,
                'convertDivs' => false,
                'removeEmptyTags' => false,
                'imageUpload' => Url::to(['media/upload-imperavi']),
            ]
        ]
    ) ?>

    <div class="form-group form-buttons">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Url::previous()) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
