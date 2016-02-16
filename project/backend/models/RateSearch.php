<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Rate;

/**
 * RateSearch represents the model behind the search form about `backend\models\Rate`.
 */
class RateSearch extends Rate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'from_currency_id', 'to_currency_id', 'created_at', 'updated_at'], 'integer'],
            [['from_amount', 'to_amount'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
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
        $query = Rate::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'from_currency_id' => $this->from_currency_id,
            'to_currency_id' => $this->to_currency_id,
            'from_amount' => $this->from_amount,
            'to_amount' => $this->to_amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
