<?php

use yii\helpers\Html;

/* @var $model frontend\models\FeedbackForm */

?>

<p><?= $model->getAttributeLabel('name') . ': ' . Html::encode($model->name) ?></p>

<p><?= $model->getAttributeLabel('surname') . ': ' . Html::encode($model->surname) ?></p>

<p><?= $model->getAttributeLabel('email') . ': ' . Html::encode($model->email) ?></p>

<p><?= $model->getAttributeLabel('message') ?></p>

<p><?= $model->message ?></p>
