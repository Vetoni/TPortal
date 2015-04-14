<?php

namespace common\widgets;

use common\models\TourType;
use yii\helpers\ArrayHelper;

/**
 * Class TourTypesWidget
 * @package common\widgets
 */
class TourTypesWidget extends DropDownListWidget
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