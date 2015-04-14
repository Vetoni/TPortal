<?php

namespace common\widgets;

use Yii;

/**
 * Class NodeStatusWidget
 * @package common\widgets
 */
class NodeStatusWidget extends DropDownListWidget
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