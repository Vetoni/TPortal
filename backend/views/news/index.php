<?php

use common\widgets\NodeStatusDropDown;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewsItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create news item'), ['create'], ['class' => 'btn btn-success']) ?>
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
                    return Html::a($data->title, ['news/update', 'id' => $data->nid]);
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
