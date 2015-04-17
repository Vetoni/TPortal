<?php

namespace backend\models;

use backend\models\filter\DateTimeFilter;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use common\models\Tour;


/**
 * TourSearch represents the model behind the search form about `common\models\Tour`.
 */
class TourSearch extends Tour
{
    use DateTimeFilter;

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

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
