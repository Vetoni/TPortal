<?php

namespace common\behaviors;

use yii\base\Behavior;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Class BackUrlBehavior
 * @package common\behaviors
 */
class BackUrlBehavior extends Behavior
{
    /**
     * @return array
     */
    public function events()
    {
        return [Controller::EVENT_AFTER_ACTION => 'afterAction'];
    }

    /**
     * Implements controller after action event handler.
     */
    public function afterAction()
    {
        Url::remember();
    }
}