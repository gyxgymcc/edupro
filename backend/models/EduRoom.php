<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "edu_room".
 *
 * @property integer $id
 * @property string $room_name
 * @property string $start_time
 * @property integer $relate_teacher
 * @property string $relate_class
 */
class EduRoom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_name', 'start_time', 'relate_teacher', 'relate_class'], 'required'],
            [['relate_teacher'], 'integer'],
            [['room_name', 'relate_class'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '默认编号'),
            'room_name' => Yii::t('app', '课堂名称'),
            'start_time' => Yii::t('app', '开启时间'),
            'relate_teacher' => Yii::t('app', '关联教师'),
            'relate_class' => Yii::t('app', '关联班级'),
        ];
    }

    /**
     * @inheritdoc
     * @return EduRoomQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EduRoomQuery(get_called_class());
    }
    public function getTeacher()
    {
        return $this->hasOne(EduTeacher::className(),['id' => 'relate_teacher']);
    }
    public function getClass()
    {
        return $this->hasOne(EduClass::className(),['id' => 'relate_class']);
    }

    public function getPapercount()
    {
        return $this->hasMany(EduPaper::className(),['relate_room' => 'id']);
    }
}
