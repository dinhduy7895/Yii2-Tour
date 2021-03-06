<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Tour;

/**
 * TourSearch represents the model behind the search form about `common\models\Tour`.
 */
class TourSearch extends Tour
{
    /**
     * @inheritdoc
     */
    // public $types;
    public function rules()
    {
        return [
            [['id', 'dayTour', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['name', 'info', 'itinerary', 'avatar'], 'safe'],
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
        // $query = Tour::find()->innerJoinWith('types', true);
        $query = Tour::find();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'dayTour' => $this->dayTour,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'itinerary', $this->itinerary])
            ->andFilterWhere(['like', 'avatar', $this->avatar]);
            // ->andFilterWhere(['like', 'types', $this->types]);

        return $dataProvider;
    }
}
