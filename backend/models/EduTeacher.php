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
            [['email', 'faculty'], 'required'],
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

    public static function isAdmin()
    {
        if(Yii::$app->user->identity->username == 'admin'){
            return true;
        }
        return false;
    }

    public static function relateUser()
    {
        $uid = Yii::$app->user->identity->id;
        $teacherInfo = self::findOne(['relate_user' => $uid]);
        return $teacherInfo['id'];
    }

    public static function selfname()
    {
        $uid = Yii::$app->user->identity->id;
        $teacherInfo = self::findOne(['relate_user' => $uid]);
        if(empty($teacherInfo)){
            return '管理员';
        }
        return $teacherInfo['teacher_name'];
    }

    public static function selfbirth()
    {
        $uid = Yii::$app->user->identity->id;
        $teacherInfo = self::findOne(['relate_user' => $uid]);
        if(empty($teacherInfo)){
            return '管理员';
        }
        return '生日: '.date('Y-m-d',$teacherInfo['birth']);
    }

    public static function selfavatar()
    {
        $uid = Yii::$app->user->identity->id;
        $teacherInfo = self::findOne(['relate_user' => $uid]);
        if(empty($teacherInfo) || $teacherInfo['avatar'] == ''){
            return 'http://'.$_SERVER['HTTP_HOST'].Yii::getAlias('@web').'/uploads/teacher/teacher.png';
        }
        return 'http://'.$_SERVER['HTTP_HOST'].Yii::getAlias('@web').'/uploads/teacher/'.$teacherInfo['avatar'];
    }

    public static function getClass()
    {
        return $this->hasMany(EduRoom::className(),['id' => 'relate_room']);
    }
}
