<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "edu_paper".
 *
 * @property integer $id
 * @property string $paper_name
 * @property integer $relate_room
 */
class EduPaper extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_paper';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paper_name', 'relate_room'], 'required'],
            [['relate_room'], 'integer'],
            [['paper_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '试卷编号'),
            'paper_name' => Yii::t('app', '试卷名称'),
            'relate_room' => Yii::t('app', '关联课堂'),
        ];
    }

    /**
     * @inheritdoc
     * @return EduPaperQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EduPaperQuery(get_called_class());
    }
}
