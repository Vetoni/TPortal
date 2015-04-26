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
<h3><?= Yii::t('app','Search results') ?></h3>

<?php

$result = $model->result;

if ($result) {
    $itemsPerRow = 3;
    $rows = ceil(count($result) / $itemsPerRow);
    for ($row = 0; $row < $rows; $row++) :
        $tours = array_slice($result, $row * $itemsPerRow, $itemsPerRow);
        ?>
        <div class="search-result">
            <?php foreach ($tours as $tour): ?>
            <div>
                <a href="<?= Url::to(['tour/view', 'id' => $tour->nid]) ?>">
                    <img src="<?= $tour->imagePath ?>">
                </a>
                <p><?= $tour->title ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    <?php
    endfor;
}
else {
    echo "<p>" . Yii::t('app', 'No results found') . "</p>";
}
?>

<img class="element" src="/img/element.png" alt="">

