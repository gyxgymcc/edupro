<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "edu_answer_check".
 *
 * @property integer $id
 * @property integer $paper_id
 * @property integer $stu_id
 * @property integer $is_check
 * @property integer $exam_time
 * @property integer $teacher_id
 */
class EduAnswerCheck extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_answer_check';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paper_id', 'stu_id', 'is_check', 'exam_time', 'teacher_id'], 'required'],
            [['paper_id', 'stu_id', 'is_check', 'exam_time', 'teacher_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '默认编号',
            'paper_id' => '试卷',
            'stu_id' => '答题人',
            'is_check' => '是否批阅',
            'exam_time' => '交卷日期',
            'teacher_id' => '批卷教师',
        ];
    }

    /**
     * @inheritdoc
     * @return EduAnswerCheckQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EduAnswerCheckQuery(get_called_class());
    }

    public function getStudent()
    {
        return $this->hasOne(EduStudent::className(),['id' => 'stu_id']);
    }

    public function getPaper()
    {
        return $this->hasOne(EduPaper::className(),['id' => 'paper_id']);
    }

    public function getTeacher()
    {
        return $this->hasOne(EduTeacher::className(),['id' => 'teacher_id']);
    }
}
