<?php

use common\models\Tour;

/* @var $model frontend\models\OrderForm */

?>

<h1><?= $model->getAttributeLabel('orderNo') . ': ' . $model->orderNo ?></h1>

<p><?= Yii::t('app', 'Tour name') . ': ' . @Tour::findOne($model->tourId)->title ?></p>

<p><?= $model->getAttributeLabel('name') . ': ' . $model->name ?></p>

<p><?= $model->getAttributeLabel('surname') . ': ' . $model->surname ?></p>

<p><?= $model->getAttributeLabel('address') . ': ' . $model->address ?></p>

<p><?= $model->getAttributeLabel('email') . ': ' . $model->email ?></p>

<p><?= $model->getAttributeLabel('phone') . ': ' . $model->phone ?></p>
