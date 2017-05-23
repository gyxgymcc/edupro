<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[EduPaper]].
 *
 * @see EduPaper
 */
class EduPaperQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EduPaper[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EduPaper|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
