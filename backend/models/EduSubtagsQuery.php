<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[EduSubtags]].
 *
 * @see EduSubtags
 */
class EduSubtagsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EduSubtags[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EduSubtags|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
