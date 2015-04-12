<?php

namespace common\models;

use common\models\query\NodeQuery;
use Yii;


/**
 * This is the model class for table "node".
 *
 * @property integer $nid
 * @property integer $pid
 * @property string $type
 * @property string $title
 * @property integer $status
 * @property string $lang
 * @property string $created
 * @property string $changed
 */
class Node extends Entity
{
    const STATUS_PUBLISHED = 1;
    const STATUS_DRAFT = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'node';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pid', 'status'], 'integer'],
            [['type', 'title', 'status', 'lang'], 'required'],
            [['created', 'changed'], 'safe'],
            [['type'], 'string', 'max' => 32],
            [['title'], 'string', 'max' => 255],
            [['lang'], 'string', 'max' => 12]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nid' => Yii::t('app', 'Nid'),
            'pid' => Yii::t('app', 'Pid'),
            'type' => Yii::t('app', 'Type'),
            'title' => Yii::t('app', 'Title'),
            'status' => Yii::t('app', 'Status'),
            'lang' => Yii::t('app', 'Lang'),
            'created' => Yii::t('app', 'Created'),
            'changed' => Yii::t('app', 'Changed'),
        ];
    }

    /**
     * @return NodeQuery
     */
    public static function find()
    {
        return new NodeQuery(get_called_class());
    }

    /**
     * Get nodes filtered by type and sorted by nid.
     * @param $type
     * @return static
     */
    public static function filter($type)
    {
        return parent::find()
            ->where(['type' => $type])
            ->orderBy(['nid' => SORT_ASC]);
    }
}
