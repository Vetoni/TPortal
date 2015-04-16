<?php

/* @var $this yii\web\View */
/* @var $model common\models\TourType */

$this->title = Yii::t('app', 'Update tour type: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tour types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['update', 'id' => $model->tid]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tour-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
