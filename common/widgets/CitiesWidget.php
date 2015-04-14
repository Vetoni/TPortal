<?php

namespace common\widgets;

use common\models\City;
use yii\helpers\ArrayHelper;

/**
 * Class CitiesWidget
 * @package common\widgets
 */
class CitiesWidget extends DropDownListWidget
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->items = ArrayHelper::map(
            City::find()
                ->orderBy('name')
                ->all(),
            'cid',
            'name'
        );
    }
}