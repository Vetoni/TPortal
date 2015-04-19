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
     * Get top news
     */
    public static function getTop()
    {
        return static::find()
            ->andWhere(['status' => 1])
            ->orderBy('created')
            ->limit(3);
    }


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