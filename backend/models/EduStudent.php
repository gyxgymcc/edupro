<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "edu_student".
 *
 * @property integer $id
 * @property string $student_name
 * @property string $email
 * @property string $avatar
 * @property integer $relate_user
 */
class EduStudent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_name', 'email'], 'required'],
            [['avatar'], 'string'],
            [['relate_user'], 'integer'],
            [['student_name'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '默认编号',
            'student_name' => '学生姓名',
            'email' => '邮箱',
            'avatar' => '头像',
            'relate_user' => '关联用户',
        ];
    }

    /**
     * @inheritdoc
     * @return EduStudentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EduStudentQuery(get_called_class());
    }
}
