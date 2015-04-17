<?php

namespace common\widgets;

use Yii;

/**
 * Class BooleanDropDown
 * @package common\widgets
 */
class BooleanDropDown extends EntityDropDown
{
    /**
     * @inheritdoc
     */
    public function init() {
        $this->items = [
            Yii::t('app', 'no'), Yii::t('app', 'yes')
        ];
    }
}