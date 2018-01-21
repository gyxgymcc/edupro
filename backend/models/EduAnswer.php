<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "edu_answer".
 *
 * @property integer $id
 * @property integer $stu_id
 * @property integer $paper_id
 * @property integer $sub_id
 * @property string $answer
 * @property integer $total_score
 * @property integer $correct
 * @property integer $final_score
 */
class EduAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stu_id', 'paper_id', 'sub_id'], 'required'],
            [['stu_id', 'paper_id', 'sub_id', 'total_score', 'correct', 'final_score'], 'integer'],
            [['answer'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '默认编号',
            'stu_id' => '学生ID',
            'paper_id' => '试卷ID',
            'sub_id' => '题目ID',
            'answer' => '答案',
            'total_score' => '分值',
            'correct' => '是否正确',
            'final_score' => '得分',
        ];
    }

    /**
     * @inheritdoc
     * @return EduAnswerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EduAnswerQuery(get_called_class());
    }
}
