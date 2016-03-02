<?php

namespace common\models\query;

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
        $this->innerJoinWith([
            'tenant' => function($query){
                $query->andWhere([
                    'tenant.name' => 'Свободно'
                ]);
            }
        ]);
        /*$this->andWhere([
            'tenant_id' => null
        ]);*/
        return $this;
    }
}