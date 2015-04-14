<?php

namespace common\widgets;


use yii\base\Widget;
use yii\helpers\Html;

class TourTypeLinkWidget extends Widget
{

    public $model = null;

    public function run()
    {
        $parentType = $this->model->parent;
        return is_null($parentType) ? null
            : Html::a($parentType->name,['tour-type/update', 'id' => $this->model->pid]);
    }
}