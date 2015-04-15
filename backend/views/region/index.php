<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RegionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Regions');
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="region-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Region'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'rid',
            ],
            [
                'attribute' => 'name',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::a($data->name, ['region/update', 'id' => $data->rid]);
                },
            ],
            [
                'attribute' => 'description',
                'filter' => false,
                'format' => 'html',
                'enableSorting' => false,
            ],
            [
                'format' => 'raw',
                'value' => function ($data) {
                    return Html::a(Yii::t('app', 'View cities'), ['city/index', 'rid' => $data->rid ]);
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>

</div>
