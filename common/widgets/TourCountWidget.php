<?php

namespace common\widgets;

use common\models\Tour;
use yii\base\Widget;

/**
 * Class TourCountWidget
 * @package common\widgets
 */
class TourCountWidget extends Widget
{
    /**
     * @inheritdoc
     */
    public function run()
    {
        return Tour::find()->count();
    }
}