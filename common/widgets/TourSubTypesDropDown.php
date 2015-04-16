<?php

namespace common\widgets;

use common\models\TourType;
use yii\helpers\ArrayHelper;

/**
 * Class TourSubTypesDropDown
 * @package common\widgets
 */
class TourSubTypesDropDown extends TourTypesDropDown
{
    /**
     * @inheritdoc
     */
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