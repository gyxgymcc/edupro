<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[EduAnswerCheck]].
 *
 * @see EduAnswerCheck
 */
class EduAnswerCheckQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EduAnswerCheck[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EduAnswerCheck|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
