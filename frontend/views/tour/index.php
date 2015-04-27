<?php

use common\models\City;
use common\models\Region;
use common\models\TourType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TourSearch */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'Tours');

$regions = Region::getList();
$cities = City::getList($model->rid);
$types = TourType::getTopList();
$subtypes = TourType::getList($model->pid);
?>

<?php $form = ActiveForm::begin(['id' => 'tour_search']); ?>

<h3><?= Yii::t('app','Search tour') ?></h3>

<?= $form->field($model, 'pid')->dropDownList($types, [
    'prompt' => Yii::t('app', 'Choose a type'),
    'data-ajax' => 'true',
    'data-target' => 'tid',
    'data-url' => yii\helpers\Url::to(['tour-sub-type/list']),
    'data-attribute' => 'pid',
]) ?>

<?= $form->field($model, 'tid')->dropDownList($subtypes, [
    'prompt' => Yii::t('app', 'Choose a sub type'),
]) ?>

<?= $form->field($model, 'rid')->dropDownList($regions, [
    'prompt' => Yii::t('app', 'Choose a region'),
    'data-ajax' => 'true',
    'data-target' => 'cid',
    'data-url' => yii\helpers\Url::to(['city/list']),
    'data-attribute' => 'rid',
]) ?>

<?= $form->field($model, 'cid')->dropDownList($cities, [
    'prompt' => Yii::t('app', 'Choose a city'),
]) ?>

<?= $form->field($model, 'special_order')->checkbox([], false) ?>

<?= Html::submitButton(Yii::t('app','Search')) ?>

<?php ActiveForm::end(); ?>

<?php if ($model->result !== null) : ?>

<h3><?= Yii::t('app','Search results') ?></h3>
<?= $this->render('/shared/_grid', [
    'source' => $model->result,
    'getUrl' => function($item) { return Url::to(['tour/view', 'id' => $item->nid]); }
]) ?>

<?php endif; ?>