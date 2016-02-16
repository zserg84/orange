<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 11.02.16
 * Time: 13:18
 */

namespace backend\models\search;


use common\models\UkServices;
use yii\data\ActiveDataProvider;

class UkServicesSearch extends UkServices
{

    public function rules(){
        return [
            ['name', 'safe'],
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

        $query->andFilterWhere(['LIKE', 'uk_services.name', $this->name]);

        return $dataProvider;
    }
} 