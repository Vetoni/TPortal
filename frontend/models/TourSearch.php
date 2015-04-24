<?php

namespace frontend\models;

use common\models\Region;
use common\models\Tour;
use common\models\TourType;
use Yii;
use yii\helpers\ArrayHelper;


/**
 * Class TourSearch
 * @package frontend\models
 */
class TourSearch extends Tour
{
    /**
     * @var
     */
    public $pid;

    /**
     * @var
     */
    public $rid;

    /**
     * @var
     */
    public $date;

    /**
     * @var
     */
    public $result;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nid', 'pid', 'tid', 'rid', 'cid', 'status', 'special_order', 'date', 'type', 'title', 'created', 'changed'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pid' => Yii::t('app', 'Tour type'),
            'tid' => Yii::t('app', 'Tour subtype'),
            'rid' => Yii::t('app', 'Region'),
            'cid' => Yii::t('app', 'City'),
            'date' => Yii::t('app', 'Date'),
            'special_order' => Yii::t('app', 'Special order'),
        ];
    }

    /**
     * Search tours.
     * @return ActiveDataProvider
     */
    public function search() {
        $query = Tour::find();

        if ($this->rid && !$this->cid) {
            $keys = Region::findOne($this->rid)->cities;
            $query->andFilterWhere(['IN', 'c.cid', ArrayHelper::getColumn($keys, 'cid')]);
        }
        else if ($this->pid && !$this->tid) {
            $keys = TourType::findOne($this->pid)->children;
            $query->andFilterWhere(['IN', 't.tid', ArrayHelper::getColumn($keys, 'tid')]);
        }
        else {
            $query->andFilterWhere([
                'c.cid' => $this->cid,
                't.tid' => $this->tid,
            ]);
        }

        if ($this->special_order) {
            $query->andFilterWhere(['s.special_order' => $this->special_order]);
        }

        $query->andFilterWhere(['status' => 1]);

        $this->result = $query->all();
        return $this->result;
    }
}