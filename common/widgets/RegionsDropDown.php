<?php

namespace common\widgets;

use common\models\Region;
use yii\helpers\ArrayHelper;

/**
 * Class RegionsDropDown
 * @package common\widgets
 */
class RegionsDropDown extends EntityDropDown
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