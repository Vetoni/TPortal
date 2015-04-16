<?php

namespace common\widgets;

use common\models\City;
use yii\helpers\ArrayHelper;

/**
 * Class CitiesDropDown
 * @package common\widgets
 */
class CitiesDropDown extends EntityDropDown
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