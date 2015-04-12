<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property integer $cid
 * @property integer $rid
 * @property string $name
 * @property string $description
 * @property string $image_url
 *
 * @property Region $region
 * @property Tour[] $tours
 */
class City extends Entity
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rid', 'name'], 'required'],
            [['rid'], 'integer'],
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
            'cid' => Yii::t('app', 'Id'),
            'rid' => Yii::t('app', 'Region Id'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'image_url' => Yii::t('app', 'Image Url'),
        ];
    }

    /**
     * Gets a region for the current city.
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['rid' => 'rid']);
    }

    /**
     * Gets tours for the current city.
     * @return static
     */
    public function getTours()
    {
        return $this->hasMany(Tour::className(), ['nid' => 'nid'])
            ->viaTable('field_data_city', ['value' => 'cid']);
    }
}