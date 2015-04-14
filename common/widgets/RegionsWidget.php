<?php

namespace common\widgets;

use common\models\Region;
use yii\helpers\ArrayHelper;

/**
 * Class RegionsWidget
 * @package common\widgets
 */
class RegionsWidget extends DropDownListWidget
{
    /**
     * @inheritdoc
     */
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