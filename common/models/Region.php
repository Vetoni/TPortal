<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "region".
 *
 * @property integer $rid
 * @property string $name
 * @property string $description
 *
 * @property City[] $cities
 */
class Region extends Entity
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                [['name'], 'required'],
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
                'rid' => Yii::t('app', 'Id'),
                'name' => Yii::t('app', 'Name'),
                'description' => Yii::t('app', 'Description'),
            ]
        );
    }

    /**
     * Gets region cities.
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['rid' => 'rid']);
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return ArrayHelper::map(static::find()->all(), 'rid', 'name');
    }
}
