<?php


/* @var $this yii\web\View */
/* @var $model common\models\TourType */

$this->title = Yii::t('app', 'Create tour type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tour types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
