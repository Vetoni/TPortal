<?php

namespace common\widgets;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Class TourTypeLinkWidget
 * @package common\widgets
 */
class TourTypeLinkWidget extends Widget
{

    /**
     * @var null
     */
    public $model = null;

    /**
     * @inheritdoc
     */
    public function run()
    {
        $parentType = $this->model->parent;
        return is_null($parentType) ? null
            : Html::a($parentType->name,['tour-type/update', 'id' => $this->model->pid]);
    }
}