<?php


use common\widgets\RegionsWidget;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create City'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'cid',
            [
                'attribute' => 'name',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::a($data->name, ['city/update', 'id' => $data->cid]);
                },
            ],
            [
                'attribute' => 'rid',
                'filter' => RegionsWidget::widget(['model' => $searchModel, 'attribute' => 'rid']),
                'format' => 'html',
                'enableSorting' => false,
                'value' => function($data) {
                    return Html::a($data->region->name, ['region/update', 'id' => $data->rid]);
                }
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
