<?php

namespace common\widgets;

use Yii;

class NodeStatusWidget extends DropDownListWidget
{
    public function init() {
        $this->items = [
            Yii::t('app', 'not published'), Yii::t('app', 'published')
        ];
    }
}