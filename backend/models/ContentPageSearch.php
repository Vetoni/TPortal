<?php

namespace backend\models;

use backend\models\filter\DateTimeFilter;
use common\models\ContentPage;
use Yii;
use yii\data\ActiveDataProvider;


/**
 * ContentSearch represents the model behind the search form about `common\models\NewsItem`.
 */
class ContentPageSearch extends ContentPage
{
    use DateTimeFilter;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nid', 'pid', 'status'], 'integer'],
            [['type', 'title', 'created', 'changed' ], 'safe'],
        ];
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
        $query = ContentPage::find();

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
            'status' => $this->status,
        ]);

        $this->applyDateFilter($query, 'created', $this->created);
        $this->applyDateFilter($query, 'changed', $this->changed);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
