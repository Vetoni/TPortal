<?php

namespace common\models;

/**
 * Class ContentPage
 * @package common\models
 */
class ContentPage extends Node
{
    /**
     * @inheritdoc
     */
    public static function find()
    {
        return parent::find()->andWhere(['type' => 'content']);
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->type = 'content';
            return true;
        } else {
            return false;
        }
    }
}