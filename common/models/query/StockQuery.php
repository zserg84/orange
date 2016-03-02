<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[Stock]].
 *
 * @see Stock
 */
class StockQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Stock[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Stock|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function active(){
        $curDate = date('Y-m-d');
        $this->andWhere([
            '>=', 'date_end', $curDate
        ]);
    }

    public function archive(){
        $curDate = date('Y-m-d');
        $this->andWhere([
            '<', 'date_end', $curDate
        ]);
    }
}