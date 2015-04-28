<?php

use common\widgets\BooleanDropDown;
use common\widgets\CitiesDropDown;
use common\widgets\NodeStatusDropDown;
use common\widgets\TourSubTypesDropDown;
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

    <?= $form->field($model, 'tid')->widget(TourSubTypesDropDown::className()) ?>

    <?= $form->field($model, 'cid')->widget(CitiesDropDown::className()) ?>

    <?= $form->field($model, 'status')->widget(NodeStatusDropDown::className()) ?>

    <?= $form->field($model, 'special_order')->widget(BooleanDropDown::className()) ?>

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
                'deniedTags' => ['html', 'head', 'link', 'body', 'meta', 'style', 'applet'],
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
