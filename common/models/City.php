<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

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
        return ArrayHelper::merge(
            parent::rules(),
            [
                [['rid', 'name'], 'required'],
                [['rid'], 'integer'],
                [['description'], 'string'],
                [['name'], 'string', 'max' => 45],
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
                'cid' => Yii::t('app', 'Id'),
                'rid' => Yii::t('app', 'Region'),
                'name' => Yii::t('app', 'Name'),
                'description' => Yii::t('app', 'Description'),
            ]
        );
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
            ->viaTable('field_data_city', ['cid' => 'cid']);
    }

    /**
     * @param $rid
     * @return mixed
     */
    public static function getList($rid)
    {
        $cities = strlen($rid) == 0 ?
            static::find()->all() :
            Region::findOne($rid)->cities;

        return ArrayHelper::map($cities, 'cid', 'name');
    }
}