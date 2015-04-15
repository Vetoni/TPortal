<?php

use common\widgets\TourTypeLinkWidget;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TourTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tour types');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Tour type'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'tid',
            [
                'attribute' => 'name',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::a($data->name, ['tour-type/update', 'id' => $data->tid]);
                },
            ],
            [
                'attribute' => 'pid',
                'filter' => \common\widgets\TourTypesWidget::widget(['model' => $searchModel, 'attribute' => 'pid']),
                'format' => 'html',
                'enableSorting' => false,
                'value' => function($data) {
                    return @Html::a($data->parent->name,['tour-type/update', 'id' => $data->pid]);
                },
            ],
            [
                'attribute' => 'image',
                'format' => 'image',
                'filter' => false,
                'value' => function ($data) {
                    return $data->imagePath;
                },
            ],
            [
                'attribute' => 'description',
                'filter' => false,
                'format' => 'html',
                'enableSorting' => false,
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>

</div>
