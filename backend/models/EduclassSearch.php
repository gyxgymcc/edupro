<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\EduClass;

/**
 * EduclassSearch represents the model behind the search form about `backend\models\EduClass`.
 */
class EduclassSearch extends EduClass
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'relate_teacher'], 'integer'],
            [['class_name'], 'safe'],
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
        $query = EduClass::find();

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
            'relate_teacher' => $this->relate_teacher,
        ]);

        $query->andFilterWhere(['like', 'class_name', $this->class_name]);

        if(!EduTeacher::isAdmin()){
            $uid = Yii::$app->user->identity->id;
            $teacherInfo = EduTeacher::findOne(['relate_user' => $uid]);
            $query->andFilterWhere(['relate_teacher' => $teacherInfo->id]);
        }

        return $dataProvider;
    }
}
