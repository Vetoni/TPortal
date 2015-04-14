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
    public static function find()
    {
        return parent::find()
            ->select('node.*, c.cid, t.tid')
            ->leftJoin('field_data_city c', 'node.nid = c.nid')
            ->leftJoin('field_data_tour_type t', 'node.nid = t.nid')
            ->andWhere(['type' => 'tour']);
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
        $command = $this->getDb()->createCommand();

        $command->delete('field_data_city', ['nid' => $this->nid])
            ->execute();
        $command->insert('field_data_city', ['nid' => $this->nid, 'cid' => $this->cid])
            ->execute();

        $command->delete('field_data_tour_type', ['nid' => $this->nid])
            ->execute();
        $command->insert('field_data_tour_type', ['nid' => $this->nid, 'tid' => $this->tid])
            ->execute();

        parent::afterSave($insert, $changedAttributes);
    }
}