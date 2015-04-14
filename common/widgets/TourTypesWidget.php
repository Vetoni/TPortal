<?php

namespace common\widgets;

use common\models\TourType;
use yii\helpers\ArrayHelper;

class TourTypesWidget extends DropDownListWidget
{
    public function init()
    {
        $this->items = ArrayHelper::map
        (
            TourType::find()
                ->where(['pid' => null])
                ->orderBy('name')
                ->all(),
            'tid',
            'name'
        );
    }
}