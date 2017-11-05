<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[EduStudentClass]].
 *
 * @see EduStudentClass
 */
class EduStudentClassQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EduStudentClass[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EduStudentClass|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
