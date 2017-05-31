<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "edu_teacher".
 *
 * @property integer $id
 * @property string $teacher_name
 * @property string $email
 * @property string $avatar
 * @property string $birth
 * @property string $sex
 * @property string $phone
 * @property string $school
 * @property string $faculty
 */
class EduTeacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'school', 'faculty'], 'required'],
            [['teacher_name', 'email', 'school', 'faculty'], 'string', 'max' => 50],
            [['avatar'], 'string', 'max' => 200],
            [['sex', 'phone'], 'string', 'max' => 20],
            ['birth','safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '编号'),
            'teacher_name' => Yii::t('app', '名字'),
            'email' => Yii::t('app', '邮件'),
            'avatar' => Yii::t('app', '头像'),
            'birth' => Yii::t('app', '生日'),
            'sex' => Yii::t('app', '性别'),
            'phone' => Yii::t('app', '电话'),
            'school' => Yii::t('app', '学校'),
            'faculty' => Yii::t('app', '院系'),
        ];
        
    }

    /**
     * @inheritdoc
     * @return EduTeacherQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EduTeacherQuery(get_called_class());
    }
}
