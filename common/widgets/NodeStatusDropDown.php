<?php

namespace common\widgets;

use Yii;

/**
 * Class NodeStatusDropDown
 * @package common\widgets
 */
class NodeStatusDropDown extends EntityDropDown
{
    /**
     * @inheritdoc
     */
    public function init() {
        $this->items = [
            Yii::t('app', 'not published'), Yii::t('app', 'published')
        ];
    }
}