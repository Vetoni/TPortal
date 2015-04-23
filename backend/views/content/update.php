<?php

/* @var $this yii\web\View */
/* @var $model common\models\ContentPageItem */

$this->title = Yii::t('app', 'Update content page: ') . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Content pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['update', 'id' => $model->nid]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="content-page-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
