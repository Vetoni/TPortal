<?php


/* @var $this yii\web\View */
/* @var $model common\models\NewsItem */

$this->title = Yii::t('app', 'Create content page');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Content pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-page-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
