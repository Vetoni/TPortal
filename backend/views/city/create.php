<?php


/* @var $this yii\web\View */
/* @var $model common\models\City */

$this->title = Yii::t('app', 'Create city');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
