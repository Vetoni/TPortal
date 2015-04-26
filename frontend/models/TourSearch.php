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
    public $result;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nid', 'pid', 'tid', 'rid', 'cid', 'status', 'special_order', 'type', 'title', 'created', 'changed'], 'safe'],
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

        if ($this->cid) {
            $query->andFilterWhere(['c.cid' => $this->cid]);
        }

        if ($this->pid && !$this->tid) {
             $keys = TourType::findOne($this->pid)->children;
             $query->andFilterWhere(['IN', 't.tid', ArrayHelper::getColumn($keys, 'tid')]);
        }

        if ($this->tid) {
            $query->andFilterWhere(['t.tid' => $this->tid]);
        }

        if ($this->special_order) {
            $query->andFilterWhere(['s.special_order' => $this->special_order]);
        }

        $this->result = $query->all();
        return $this->result;
    }
}