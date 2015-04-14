<?php

namespace backend\models;

use DateTime;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

use common\models\Tour;
use yii\helpers\ArrayHelper;


/**
 * TourSearch represents the model behind the search form about `common\models\Tour`.
 */
class TourSearch extends Tour
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nid', 'pid', 'status'], 'integer'],
            [['type', 'title', 'created', 'changed', 'cid', 'tid' ], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return ArrayHelper::merge(
            Model::scenarios(),
            [
                Model::SCENARIO_DEFAULT => ['tid', 'cid'],
            ]
        );
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Tour::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'node.nid' => $this->nid,
            'c.cid' => $this->cid,
            't.tid' => $this->tid,
            'status' => $this->status,
        ]);

        $this->applyDateFilter($query, 'created', $this->created);
        $this->applyDateFilter($query, 'changed', $this->changed);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }


    /**
     * Applies date filter to the query.
     * @param $query \yii\db\Query
     * @param $field string
     * @param $date string
     */
    protected function applyDateFilter(&$query, $field, $date)
    {
        $parsed = $this->parseDateTime($date);
        if (!is_object($parsed)) return;
        $start = $parsed->setTime(0, 0, 0)->format('Y-m-d H:i:s');
        $end = $parsed->setTime(23, 59, 59)->format('Y-m-d H:i:s');
        $query->andFilterWhere(['between', $field, $start, $end]);
    }

    /**
     * Parses date time from string and returns null if exception is thrown;
     * @param $format
     * @return DateTime|null
     */
    protected function parseDateTime($format)
    {
        if ($format == null) {
            return null;
        }
        try
        {
            return new DateTime($format);
        }
        catch(\Exception $e)
        {
            return null;
        }
    }
}
