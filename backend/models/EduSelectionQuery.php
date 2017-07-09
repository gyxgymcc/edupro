<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[EduSelection]].
 *
 * @see EduSelection
 */
class EduSelectionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EduSelection[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EduSelection|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
