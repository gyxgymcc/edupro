<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[EduStudent]].
 *
 * @see EduStudent
 */
class EduStudentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EduStudent[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EduStudent|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
