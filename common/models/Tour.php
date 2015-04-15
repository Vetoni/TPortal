<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * Class Tour
 * @package common\models
 *
 * @property integer $cid
 * @property integer $tid
 * @property integer $tourType
 * @property integer $city
 */
class Tour extends Node
{

    /**
     * @var
     */
    public $cid;

    /**
     * @var
     */
    public $tid;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                [['cid', 'tid'], 'integer'],
                [['cid', 'tid'], 'required'],
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
                'cid' => Yii::t('app', 'City'),
                'tid' => Yii::t('app', 'Tour type'),
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public static function tableRelations()
    {
        return [
            [
                'tableName' => 'field_data_city',
                'alias' => 'c',
                'attributeName' => 'cid',
            ],
            [
                'tableName' => 'field_data_tour_type',
                'alias' => 't',
                'attributeName' => 'tid',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function find()
    {
        return parent::find()->andWhere(['type' => 'tour']);
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->type = 'tour';
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param bool $insert
     * @param array $changedAttributes
     */
    public function afterSave($insert, $changedAttributes)
    {
        $this->saveRelation('field_data_city', 'cid', $this->cid);
        $this->saveRelation('field_data_tour_type', 'tid', $this->tid);
        parent::afterSave($insert, $changedAttributes);
    }
}