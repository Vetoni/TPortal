<?php

namespace common\widgets;

use common\models\TourType;
use yii\helpers\ArrayHelper;

/**
 * Class TourSubTypesWidget
 * @package common\widgets
 */
class TourSubTypesWidget extends TourTypesWidget
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