<?php

use common\models\Tour;
use yii\helpers\Html;

/* @var $model frontend\models\OrderForm */

?>

<h1><?= $model->getAttributeLabel('orderNo') . ': ' . Html::encode($model->orderNo) ?></h1>

<p><?= Yii::t('app', 'Tour name') . ': ' . @Tour::findOne($model->tourId)->title ?></p>

<p><?= $model->getAttributeLabel('name') . ': ' . Html::encode($model->name) ?></p>

<p><?= $model->getAttributeLabel('surname') . ': ' . Html::encode($model->surname) ?></p>

<p><?= $model->getAttributeLabel('address') . ': ' . Html::encode($model->address) ?></p>

<p><?= $model->getAttributeLabel('email') . ': ' . Html::encode($model->email) ?></p>

<p><?= $model->getAttributeLabel('phone') . ': ' . Html::encode($model->phone) ?></p>
