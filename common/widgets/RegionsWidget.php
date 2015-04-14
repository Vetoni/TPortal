<?php

namespace common\widgets;

use common\models\Region;
use yii\helpers\ArrayHelper;

class RegionsWidget extends DropDownListWidget
{
    public function init()
    {
        $this->items = ArrayHelper::map(
            Region::find()
                ->orderBy('name')
                ->all(),
            'rid',
            'name'
        );
    }
}