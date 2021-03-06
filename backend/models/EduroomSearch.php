<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\EduRoom;

/**
 * EduroomSearch represents the model behind the search form about `backend\models\EduRoom`.
 */
class EduroomSearch extends EduRoom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'relate_teacher'], 'integer'],
            [['room_name', 'start_time', 'relate_class'], 'safe'],
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
        $query = EduRoom::find();

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

        if(!empty($this->start_time)){
            // $query->andFilterWhere(['>','start_time', strtotime($this->start_time)])
            // ->andFilterWhere(['<','start_time', strtotime($this->start_time)+86400]);
            $query->andFilterWhere([
                'start_time' => strtotime($this->start_time),
            ]);
        }

        $isStudent = EduStudent::isStudent();

        if(!EduTeacher::isAdmin() && !$isStudent){
            $uid = Yii::$app->user->identity->id;
            $teacherInfo = EduTeacher::findOne(['relate_user' => $uid]);
            $query->andFilterWhere(['relate_teacher' => $teacherInfo->id]);
        }

        if($isStudent){
            $uid = Yii::$app->user->identity->id;
            $studentInfo = EduStudent::findOne(['relate_user' => $uid]);
            $stuid = $studentInfo['id'];
            $inClasses = EduStudentClass::find()->where(['student_id' => $stuid])->all();
            if(!empty($inClasses)){
                $classids = array_column($inClasses, 'class_id');
            }else{
                $classids = ['2099'];
            }
            $query->andFilterWhere(['in', 'relate_class', $classids]);
        }

        $query->andFilterWhere(['like', 'room_name', $this->room_name])
            ->andFilterWhere(['like', 'relate_class', $this->relate_class]);

        return $dataProvider;
    }
}
