<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Level]].
 *
 * @see Level
 */
class LevelQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Level[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Level|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}