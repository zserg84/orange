<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Space]].
 *
 * @see Space
 */
class SpaceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Space[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Space|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function free(){
        $this->joinWith([
            'tenants' => function($query){
                $query->andWhere([
                    'tenant.id' => null
                ]);
            }
        ]);
        return $this;
    }
}