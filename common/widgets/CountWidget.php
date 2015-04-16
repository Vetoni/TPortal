<?php

namespace common\widgets;

use Yii;
use yii\base\Widget;

/**
 * Class CountWidget
 * @package common\widgets
 */
class CountWidget extends Widget
{
    public $entity;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $model = Yii::createObject("common\\models\\{$this->entity}");
        return $model::find()->count();
    }
}