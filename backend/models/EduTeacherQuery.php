<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[EduTeacher]].
 *
 * @see EduTeacher
 */
class EduTeacherQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EduTeacher[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EduTeacher|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
