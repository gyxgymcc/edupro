<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "edu_subtags".
 *
 * @property integer $id
 * @property integer $subid
 * @property integer $tagid
 */
class EduSubtags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_subtags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subid', 'tagid'], 'required'],
            [['subid', 'tagid'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '默认编号',
            'subid' => '题目编号',
            'tagid' => '标签编号',
        ];
    }

    /**
     * @inheritdoc
     * @return EduSubtagsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EduSubtagsQuery(get_called_class());
    }
}
