<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[EduClass]].
 *
 * @see EduClass
 */
class EduClassQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EduClass[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EduClass|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
