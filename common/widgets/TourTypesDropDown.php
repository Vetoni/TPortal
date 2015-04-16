<?php

namespace common\widgets;

use common\models\TourType;
use yii\helpers\ArrayHelper;

/**
 * Class TourTypesDropDown
 * @package common\widgets
 */
class TourTypesDropDown extends EntityDropDown
{
    /**
     * @inheritdoc
     */
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