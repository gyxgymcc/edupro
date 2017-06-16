<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "edu_selection".
 *
 * @property integer $id
 * @property integer $relate_subject
 * @property string $content
 * @property integer $iscorrect
 */
class EduSelection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_selection';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['relate_subject', 'iscorrect'], 'integer'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '默认编号',
            'relate_subject' => '关联题目',
            'content' => '选项内容',
            'iscorrect' => '是否正确答案',
        ];
    }

    /**
     * @inheritdoc
     * @return EduSelectionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EduSelectionQuery(get_called_class());
    }
}
