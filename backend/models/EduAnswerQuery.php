<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[EduAnswer]].
 *
 * @see EduAnswer
 */
class EduAnswerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EduAnswer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EduAnswer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
