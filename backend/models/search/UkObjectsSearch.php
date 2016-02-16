<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 11.02.16
 * Time: 13:26
 */

namespace backend\models\search;


use common\models\UkObjects;
use yii\data\ActiveDataProvider;

class UkObjectsSearch extends UkObjects
{
    public function rules(){
        return [
            ['address', 'safe'],
        ];
    }

    public function search($params = null)
    {
        $query = self::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['LIKE', 'uk_objects.address', $this->address]);

        return $dataProvider;
    }
} 