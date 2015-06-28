<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
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
     * Gets table relations.
     * This should be an array in the following format:
     * [
     *      ['tableName' => 'table1', 'alias' => 't1', 'attributeName' => 'attr1' ],
     *      ['tableName' => 'table2', 'alias' => 't2', 'attributeName' => 'attr2' ],
     *      ...
     * ]
     * In default implementation returns empty array (that means no table relations).
     * @return array
     */
    public static function tableRelations()
    {
        return [];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'changed',
            ],
        ];
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
                [['title', 'status'], 'required'],
                [['created', 'changed'], 'safe'],
                [['title'], 'string', 'max' => 255],
                [['description','announce'], 'string'],
                [['type'], 'safe'],
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

    /**
     * @inheritdoc
     */
    public static function find()
    {
        $relations = static::tableRelations();
        $query = parent::find();
        $selectQuery = "node.*";

        foreach ($relations as $tr) {
            $table = $tr['tableName'];
            $alias = $tr['alias'];
            $attribute = $tr['attributeName'];
            $selectQuery .= ", {$alias}.{$attribute}";
            $query = $query->leftJoin("{$table} {$alias}", "node.nid = {$alias}.nid");
        }

        $query = $query->select($selectQuery);

        if (Yii::$app->id == 'app-frontend') {
            $query->andFilterWhere(['status' => 1]);
        }

        return $query;

    }

    /**
     * Inserts or updates record in junction table.
     * @param $tableName
     * @param $attributeName
     * @param $attributeValue
     * @throws \yii\db\Exception
     */
    public function saveRelation($tableName, $attributeName, $attributeValue)
    {
        $command = $this->getDb()->createCommand();
        $command->delete($tableName, ['nid' => $this->nid])->execute();
        $command->insert($tableName, ['nid' => $this->nid, $attributeName => $attributeValue])
            ->execute();
    }
}
