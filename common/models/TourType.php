<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tour_type".
 *
 * @property integer $tid
 * @property integer $pid
 * @property string $name
 * @property string $description
 * @property string $image_url
 *
 * @property TourType $parent
 * @property TourType[] $children
 * @property Tour[] $tours
 */
class TourType extends Entity
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tour_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                [['pid'], 'integer'],
                [['name'], 'required'],
                [['description'], 'string'],
                [['name'], 'string', 'max' => 45],
                [['image_url'], 'string', 'max' => 255]
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(
            parent::attributeLabels(),
            [
                'tid' => Yii::t('app', 'Id'),
                'pid' => Yii::t('app', 'Parent'),
                'name' => Yii::t('app', 'Name'),
                'description' => Yii::t('app', 'Description'),
                'image_url' => Yii::t('app', 'Image Url'),
            ]
        );
    }

    /**
     * Get parent type.
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(TourType::className(), ['tid' => 'pid']);
    }

    /**
     * Get sub types of the current type.
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(TourType::className(), ['pid' => 'tid']);
    }

    /**
     * Gets tours of the current type.
     * @return \yii\db\ActiveQuery
     */
    public function getTours()
    {
        return $this->hasMany(Tour::className(), ['tid' => 'tid']);
    }

    /**
     * Get only top level tour types.
     * @return static[]
     */
    public static function getTopLevelOnly() {
        return static::findAll(['pid' => null]);
    }
}
