<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create City'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'cid',
            [
                'attribute' => 'rid',
                'filter' => $regions,

                'format' => 'html',
                'value' => function($data) {
                    return Html::a($data->region->name, ['region/update', 'id' => $data->rid]);
                }
            ],
            'name',
            [
                'attribute' => 'image',
                'format' => 'image',
                'filter' => false,
                'value' => function ($data) {
                    return $data->image_base_url . '/' . $data->image_url;
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
