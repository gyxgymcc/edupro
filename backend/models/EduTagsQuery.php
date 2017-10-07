<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[EduTags]].
 *
 * @see EduTags
 */
class EduTagsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EduTags[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EduTags|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
