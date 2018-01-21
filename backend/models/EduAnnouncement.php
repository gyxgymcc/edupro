<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "edu_announcement".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $class_id
 * @property string $created_at
 */
class EduAnnouncement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_announcement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'class_id', 'created_at'], 'required'],
            [['class_id'], 'integer'],
            [['title', 'created_at'], 'string', 'max' => 50],
            [['content'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '默认编号',
            'title' => '标题',
            'content' => '内容',
            'class_id' => '班级ID',
            'created_at' => '发布时间',
        ];
    }

    /**
     * @inheritdoc
     * @return EduAnnouncementQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EduAnnouncementQuery(get_called_class());
    }

    public function getClass()
    {
        return $this->hasOne(EduClass::className(),['id' => 'class_id']);
    }

    public function getStudentAnnouncement()
    {
        $uid = Yii::$app->user->identity->id;
        $stuid = EduStudent::studentId();
        if(!$stuid){
            return 0;
        }

        $stuClassInfo = EduStudentClass::find()->where(['student_id' => $stuid])->orderBy('id asc')->asArray()->all();

        $classArr = array_column($stuClassInfo, 'class_id');

        $announcementInfo = self::find()->where(['in', 'class_id', $classArr])->orderBy('created_at desc')->asArray()->all();
        return $announcementInfo;
    }
}
