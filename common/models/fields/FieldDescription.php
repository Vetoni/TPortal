<?php

namespace common\models\fields;

use yii\db\ActiveRecord;


/**
 * This is the model class for table "field_data_description".
 *
 * @property integer $nid
 * @property string $value
 * @property string $summary

 */
class FieldDescription extends ActiveRecord {

    /**
     * @return string
     */
    public static function tableName() {
        return 'field_data_description';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nid' => Yii::t('app', 'Nid'),
            'value' => Yii::t('app', 'Text'),
            'summary' => Yii::t('app', 'Summary'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'string'],
            [['summary'], 'string'],
        ];
    }
}