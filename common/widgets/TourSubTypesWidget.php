<?php

namespace common\widgets;

use common\models\TourType;
use yii\helpers\ArrayHelper;

class TourSubTypesWidget extends TourTypesWidget
{
    public function init()
    {
        $this->items = ArrayHelper::map
        (
            TourType::find()
                ->where(['not', ['pid' => null]])
                ->orderBy('name')
                ->all(),
            'tid',
            'name'
        );
    }
}