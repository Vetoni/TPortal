<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Class MenuItem
 * @package frontend\models
 */
class MenuItem extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function find()
    {
        return parent::find()->where(['lang' => Yii::$app->language]);
    }
}