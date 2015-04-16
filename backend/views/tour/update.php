<?php

/* @var $this yii\web\View */
/* @var $model common\models\Tour */

$this->title = Yii::t('app', 'Update tour: ') . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tours'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['update', 'id' => $model->nid]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tour-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
