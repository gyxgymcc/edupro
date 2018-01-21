<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[EduAnnouncement]].
 *
 * @see EduAnnouncement
 */
class EduAnnouncementQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EduAnnouncement[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EduAnnouncement|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
