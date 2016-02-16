<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 29.09.15
 * Time: 11:42
 */

namespace backend\models\search;

use backend\models\Level;
use yii\data\ActiveDataProvider;

class LevelSearch extends Level
{
    public function rules(){
        return [
            [['name'], 'safe'],
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

        $query->andFilterWhere(['LIKE', 'level.name', $this->name]);

        return $dataProvider;
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [

            ]
        );
    }
} 