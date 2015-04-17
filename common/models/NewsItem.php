<?php

namespace common\models;

/**
 * Class NewsItem
 * @package common\models
 *
 */
class NewsItem extends Node
{
    /**
     * @inheritdoc
     */
    public static function find()
    {
        return parent::find()->andWhere(['type' => 'news']);
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->type = 'news';
            return true;
        } else {
            return false;
        }
    }
}