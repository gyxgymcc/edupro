<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "edu_student_class".
 *
 * @property integer $id
 * @property integer $student_id
 * @property integer $class_id
 * @property string $in_time
 * @property integer $gradute
 */
class EduStudentClass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_student_class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'class_id'], 'required'],
            [['student_id', 'class_id', 'gradute'], 'integer'],
            [['in_time'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '默认编号',
            'student_id' => '学生',
            'class_id' => '班级',
            'in_time' => '加入时间',
            'gradute' => '毕业',
        ];
    }

    /**
     * @inheritdoc
     * @return EduStudentClassQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EduStudentClassQuery(get_called_class());
    }
}
