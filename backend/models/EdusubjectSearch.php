<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\EduSubject;

/**
 * EdusubjectSearch represents the model behind the search form about `backend\models\EduSubject`.
 */
class EdusubjectSearch extends EduSubject
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'relate_paper', 'type', 'maxval', 'dif'], 'integer'],
            [['que', 'que_sec', 'answer'], 'safe'],
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
        $query = EduSubject::find();

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
            'relate_paper' => $this->relate_paper,
            'type' => $this->type,
            'maxval' => $this->maxval,
            'dif' => $this->dif,
        ]);

        $query->andFilterWhere(['like', 'que', $this->que])
            ->andFilterWhere(['like', 'que_sec', $this->que_sec])
            ->andFilterWhere(['like', 'answer', $this->answer]);

        return $dataProvider;
    }
}
