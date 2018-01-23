<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\EduAnswerCheck;

/**
 * EduanswercheckSearch represents the model behind the search form about `backend\models\EduAnswerCheck`.
 */
class EduanswercheckSearch extends EduAnswerCheck
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'paper_id', 'stu_id', 'is_check', 'teacher_id'], 'integer'],
            [['exam_time'], 'safe'],
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
        $query = EduAnswerCheck::find()->orderBy(['exam_time' => SORT_DESC]);

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
            'paper_id' => $this->paper_id,
            'stu_id' => $this->stu_id,
            'is_check' => $this->is_check,
            'teacher_id' => $this->teacher_id,
        ]);

        $query->andFilterWhere(['like', 'exam_time', $this->exam_time]);

        return $dataProvider;
    }
}
