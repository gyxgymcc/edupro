<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[EduRoom]].
 *
 * @see EduRoom
 */
class EduRoomQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EduRoom[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EduRoom|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
