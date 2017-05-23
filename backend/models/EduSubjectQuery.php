<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[EduSubject]].
 *
 * @see EduSubject
 */
class EduSubjectQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EduSubject[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EduSubject|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
