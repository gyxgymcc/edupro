<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "edu_paper".
 *
 * @property integer $id
 * @property string $paper_name
 * @property integer $relate_room
 */
class EduPaper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_paper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paper_name', 'relate_room'], 'required'],
            [['relate_room'], 'integer'],
            [['paper_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '试卷编号'),
            'paper_name' => Yii::t('app', '试卷名称'),
            'relate_room' => Yii::t('app', '关联课堂'),
        ];
    }

    /**
     * @inheritdoc
     * @return EduPaperQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EduPaperQuery(get_called_class());
    }
    public function getRoom()
    {
        return $this->hasOne(EduRoom::className(),['id' => 'relate_room']);
    }

    public function getSubjects(){
        return $this->hasMany(EduSubject::className(),['relate_paper' => 'id']);
    }

    public function getDifflabel(){
        $examDif = Yii::$app->params['examDif'];
        $diffArr = array_column($examDif, 'name');
        return $diffArr;
    }

    public function getDiff()
    {   
        $examDif = Yii::$app->params['examDif'];
        $diffArr = array_column($examDif, 'id');
        $subjekuto = EduSubject::find()->select(['SUM(1) AS count','dif'])->where(['relate_paper' => $this->id])->andWhere(['in', 'dif', $diffArr])->groupBy('dif')->asArray()->all();

        $difArray = array_column($subjekuto,'count','dif');
        foreach($examDif as $key => $val){
            $examDif[$key]['count'] = (isset($difArray[$key])) ? $difArray[$key] : "0";
        }

        $data = array_column($examDif, 'count','dif');
        return $data;
    }

    public function getTaglabel(){
        $tagData = EduTags::find()->where(['root' => 3])->orderBy('id asc')->asArray()->all();
        $tagArr = array_column($tagData, 'name');
        return $tagArr;
    }

    public function getTagvalue(){
        $tagData = EduTags::find()->where(['root' => 3])->orderBy('id asc')->asArray()->all();
        $tagArr = array_column($tagData, 'id');
        

        $subject = EduSubject::find()->select(['id'])->where(['relate_paper' => $this->id])->asArray()->all();
        $subjectIds = array_column($subject, 'id');

        $tags = EduSubtags::find()->select(['SUM(1) AS count','tagid'])->where(['in', 'subid', $subjectIds])->andWhere(['in', 'tagid', $tagArr])->groupBy('tagid')->orderBy('tagid')->asArray()->all();
       
        $tempArr = array_column($tags, 'count', 'tagid');
        
        foreach ($tagData as $key => $value) {
            $tagData[$key]['count'] = isset($tempArr[$value['id']]) ? $tempArr[$value['id']] : '0';
        }

        $data = array_column($tagData, 'count');
        return $data;
    }

    public function getKnowlabel(){
        $tagData = EduTags::find()->where(['root' => 12])->andWhere(['lvl' => 1])->orderBy('id asc')->asArray()->all();
        $tagArr = array_column($tagData, 'name');
        return $tagArr;
    }


    public function getKnowvalue(){
        $tagData = EduTags::find()->where(['root' => 12])->andWhere(['lvl' => 1])->orderBy('id asc')->asArray()->all();
        $tagArr = array_column($tagData, 'id');
        

        $subject = EduSubject::find()->select(['id'])->where(['relate_paper' => $this->id])->asArray()->all();
        $subjectIds = array_column($subject, 'id');

        $tags = EduSubtags::find()->select(['SUM(1) AS count','tagid'])->where(['in', 'subid', $subjectIds])->andWhere(['in', 'tagid', $tagArr])->groupBy('tagid')->orderBy('tagid')->asArray()->all();
       
        $tempArr = array_column($tags, 'count', 'tagid');
        
        $newArr = array();
        foreach ($tagData as $key => $value) {
            $value['count'] = isset($tempArr[$value['id']]) ? $tempArr[$value['id']] : '0';
            if($value['count'] > 0){
                array_push($newArr, $value);
            }
        }

        $data['datas'] = array_column($newArr, 'count');
        $data['labels'] = array_column($newArr, 'name');
        return $data;
    }
}
