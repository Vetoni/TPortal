<?php

namespace common\widgets;

use Yii;
use yii\base\Widget;

/**
 * Class EntityCounter
 * @package common\widgets
 */
class EntityCounter extends Widget
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