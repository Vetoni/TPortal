<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

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
class TourType extends ActiveRecord
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
        return [
            [['pid'], 'integer'],
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 45],
            [['image_url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tid' => Yii::t('app', 'Tid'),
            'pid' => Yii::t('app', 'Pid'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'image_url' => Yii::t('app', 'Image Url'),
        ];
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
    public function getTours() {
        return $this->hasMany(Tour::className(), ['tid' => 'tid']);
    }
}
