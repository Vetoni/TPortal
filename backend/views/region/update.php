<?php

/* @var $this yii\web\View */
/* @var $model common\models\Region */

$this->title = Yii::t('app', 'Update region: ') . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->rid]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="region-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
