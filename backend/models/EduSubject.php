<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "edu_subject".
 *
 * @property integer $id
 * @property integer $relate_paper
 * @property integer $type
 * @property integer $maxval
 * @property integer $dif
 * @property string $que
 * @property string $que_sec
 * @property string $answer
 */
class EduSubject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['relate_paper', 'maxval', 'dif', 'que', 'answer'], 'safe'],
            [['relate_paper', 'type', 'maxval', 'dif'], 'integer'],
            [['type','que_sec'],'safe'],
            [['que', 'que_sec', 'answer'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '默认编号'),
            'relate_paper' => Yii::t('app', '关联试卷'),
            'type' => Yii::t('app', '题型'),
            'maxval' => Yii::t('app', '分值'),
            'dif' => Yii::t('app', '难度'),
            'que' => Yii::t('app', '题干'),
            'que_sec' => Yii::t('app', '选择题候选'),
            'answer' => Yii::t('app', '答案'),
            'tags' => Yii::t('app', '标签'),
        ];
    }

    public function attributeValues()
    {
        return [
            'type' => [
                '0' => '单选题',
                '1' => '多选题',
                '2' => '填空题',
                '3' => '应用题',
            ],
        ];
    }


    /**
     * @inheritdoc
     * @return EduSubjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EduSubjectQuery(get_called_class());
    }
    public function getPaper()
    {
        return $this->hasOne(EduPaper::className(),['id' => 'relate_paper']);
    }

    public static function findEt($typeid){
        $examType = Yii::$app->params['examType'];
        return $examType[$typeid]['name'];
    }
    public static function findDi($typeid){
        $examDif = Yii::$app->params['examDif'];
        return $examDif[$typeid]['name'];
    }
}
