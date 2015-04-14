<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "node".
 *
 * @property integer $nid
 * @property integer $pid
 * @property string $type
 * @property string $title
 * @property string $announce
 * @property string $description
 * @property integer $status
 * @property string $lang
 * @property string $created
 * @property string $changed
 */
class Node extends Entity
{
    /**
     * Published status.
     */
    const STATUS_PUBLISHED = 1;
    /**
     * Draft status.
     */
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
        return ArrayHelper::merge(
            parent::rules(),
            [
                [['pid', 'status'], 'integer'],
                [['type', 'title', 'status', 'lang'], 'required'],
                [['created', 'changed'], 'safe'],
                [['type'], 'string', 'max' => 32],
                [['title'], 'string', 'max' => 255],
                [['description','announce'], 'string'],
                [['lang'], 'string', 'max' => 12]
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
                'nid' => Yii::t('app', 'Id'),
                'pid' => Yii::t('app', 'Parent'),
                'type' => Yii::t('app', 'Type'),
                'title' => Yii::t('app', 'Title'),
                'announce' => Yii::t('app', 'Announce'),
                'description' => Yii::t('app', 'Description'),
                'status' => Yii::t('app', 'Status'),
                'lang' => Yii::t('app', 'Language'),
                'created' => Yii::t('app', 'Created date'),
                'changed' => Yii::t('app', 'Changed date'),
            ]
        );
    }

    /**
     * @return string
     */
    public function getStatusText()
    {
        return $this->status == self::STATUS_PUBLISHED ?
            Yii::t('app', 'published') :
            Yii::t('app', 'not published');
    }
}
