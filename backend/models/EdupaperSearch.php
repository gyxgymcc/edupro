<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\EduPaper;

/**
 * EdupaperSearch represents the model behind the search form about `backend\models\EduPaper`.
 */
class EdupaperSearch extends EduPaper
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'relate_room'], 'integer'],
            [['paper_name'], 'safe'],
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
        $query = EduPaper::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => ['pageSize' => 20],
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
            'relate_room' => $this->relate_room,
        ]);

        $query->andFilterWhere(['like', 'paper_name', $this->paper_name]);

        return $dataProvider;
    }
}
