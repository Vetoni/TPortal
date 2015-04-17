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
 * @property integer special_order
 */
class Tour extends Node
{
    /**
     * Special order status.
     */
    const SPECIAL_ORDER = 1;
    /**
     * Default order status.
     */
    const DEFAULT_ORDER = 0;

    /**
     * @var
     */
    public $cid;

    /**
     * @var
     */
    public $tid;

    /**
     * @var
     */
    public $special_order;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                [['cid', 'tid', 'special_order'], 'integer'],
                [['cid', 'tid', 'special_order'], 'required'],
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
                'special_order' => Yii::t('app', 'Is special order'),
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
            [
                'tableName' => 'field_data_special_order',
                'alias' => 's',
                'attributeName' => 'special_order',
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
        $this->saveRelation('field_data_special_order', 'special_order', $this->special_order);
        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * @return string
     */
    public function getSpecialOrderText()
    {
        return $this->special_order == self::SPECIAL_ORDER ?
            Yii::t('app', 'yes') :
            Yii::t('app', 'no');
    }
}