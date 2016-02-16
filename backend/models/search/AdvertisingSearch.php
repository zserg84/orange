<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 11.02.16
 * Time: 12:04
 */

namespace backend\models\search;


use common\models\Advertising;
use yii\data\ActiveDataProvider;

class AdvertisingSearch extends Advertising
{

    public function rules(){
        return [
            ['name', 'safe']
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

        $query->andFilterWhere(['LIKE', 'advertising.name', $this->name]);

        return $dataProvider;
    }
} 