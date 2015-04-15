<?php


/* @var $this yii\web\View */
/* @var $model common\models\Tour */

$this->title = Yii::t('app', 'Create tour');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tours'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
