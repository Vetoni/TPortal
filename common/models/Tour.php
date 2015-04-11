<?php

namespace common\models;

use common\models\fields\FieldDescription;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * Class Tour
 * @package common\models
 *
 * @property string $cityName
 * @property string $description
 * @property string $summary
 * @property City $city
 * @property FieldDescription $fieldDescription
 */
class Tour extends Node {

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(
            parent::attributeLabels(),
            [
                'cityName' => Yii::t('app', 'City'),
            ]
        );
    }

    /**
     * Gets nodes filtered by type 'tour'.
     * @return static
     */
    public static function find() {
        return static::filter('tour');
    }

    /**
     * Gets name of the city for the current tour.
     * @return null|string
     */
    public function getCityName() {
        return is_null($this->city) ? null : $this->city->name;
    }

    /**
     * Gets description text for the current tour.
     * @return null|string
     */
    public function getDescription() {
        return is_null($this->fieldDescription) ? null : $this->fieldDescription->value;
    }

    /**
     * Gets summary text for the current tour.
     * @return null|string
     */
    public function getSummary() {
        return is_null($this->fieldDescription) ? null : $this->fieldDescription->summary;
    }

    /**
     * Gets city for the current tour.
     * @return static
     */
    protected function getCity() {
        return $this->hasOne(City::className(), ['cid' => 'value'])
            ->viaTable('field_data_city', ['nid' => 'nid']);
    }

    /**
     * Gets field description for the current tour.
     * @return \yii\db\ActiveQuery
     */
    protected function getFieldDescription() {
        return $this->hasOne(FieldDescription::className(), ['nid' => 'nid']);
    }
}