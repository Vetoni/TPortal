<?php

use common\models\City;
use common\models\TourType;
use common\widgets\CitiesDropDown;
use common\widgets\NodeStatusDropDown;
use common\widgets\TourSubTypesDropDown;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TourSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tours');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Tour'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'nid',
            ],
            [
                'attribute' => 'title',
                'format' => 'html',
                'value' => function($data) {
                    return Html::a($data->title, ['tour/update', 'id' => $data->nid]);
                }
            ],
            [
                'attribute' => 'tid',
                'filter' => TourSubTypesDropDown::widget(['model' => $searchModel, 'attribute' => 'tid']),
                'format' => 'html',
                'enableSorting' => false,
                'value' => function($data) {
                    return @Html::a(TourType::findOne($data->tid)->name, ['tour-type/update', 'id' => $data->tid]);
                }
            ],
            [
                'attribute' => 'cid',
                'filter' => CitiesDropDown::widget(['model' => $searchModel, 'attribute' => 'cid']),
                'format' => 'html',
                'enableSorting' => false,
                'value' => function($data) {
                    return @Html::a(@City::findOne($data->cid)->name, ['city/update', 'id' => $data->cid]);
                }
            ],
            [
                'attribute' => 'status',
                'format' => 'html',
                'filter' => NodeStatusDropDown::widget(['model' => $searchModel, 'attribute' => 'status']),
                'enableSorting' => false,
                'value' => function ($data) {
                    return $data->statusText;
                },
            ],
            [
                'attribute' => 'created',
                'filter' => DatePicker::widget(['model' => $searchModel, 'attribute' => 'created', 'options' => ['class' => 'form-control']]),
                'format' => 'DateTime',
            ],
            [
                'attribute' => 'changed',
                'filter' => DatePicker::widget(['model' => $searchModel, 'attribute' => 'changed', 'options' => ['class' => 'form-control']]),
                'format' => 'DateTime',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>

</div>
