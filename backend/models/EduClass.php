<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "edu_class".
 *
 * @property integer $id
 * @property string $class_name
 * @property integer $relate_teacher
 */
class EduClass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_name', 'relate_teacher'], 'required'],
            [['relate_teacher'], 'integer'],
            [['class_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '默认编号'),
            'class_name' => Yii::t('app', '班级名称'),
            'relate_teacher' => Yii::t('app', '关联教师'),
        ];
    }

    /**
     * @inheritdoc
     * @return EduClassQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EduClassQuery(get_called_class());
    }

    public function getTeacher()
    {
        return $this->hasOne(EduTeacher::className(),['id' => 'relate_teacher']);
    }

    public function getIn()
    {
        $uid = Yii::$app->user->identity->id;
        $studentInfo = EduStudent::findOne(['relate_user' => $uid]);
        $stuid = $studentInfo['id'];
        $sc = EduStudentClass::findOne(['student_id' => $stuid,'class_id' => $this->id]);
        if(empty($sc)){
            return 0;
        }
        else{
            return $sc->is_in;
        }
    }
}
