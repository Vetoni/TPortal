<?php

namespace common\widgets;

use common\models\City;
use yii\helpers\ArrayHelper;

class CitiesWidget extends DropDownListWidget
{
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