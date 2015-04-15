<?php


/* @var $this yii\web\View */
/* @var $model common\models\Region */

$this->title = Yii::t('app', 'Create region');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Regions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="region-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
