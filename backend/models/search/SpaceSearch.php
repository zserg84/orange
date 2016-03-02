<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 29.09.15
 * Time: 12:55
 */

namespace backend\models\search;


use backend\models\Space;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\helpers\VarDumper;

class SpaceSearch extends Space
{

    private $_levelName;

    public function rules(){
        return [
            [['name', 'levelName'], 'safe'],
        ];
    }

    public function search($params = null)
    {
        $query = self::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $levelId = isset($params['level_id']) ? $params['level_id'] : null;

        $query->andFilterWhere(['=', 'space.level_id', $levelId]);

        $dataProvider->setSort([
            'defaultOrder' => ['name'=>SORT_ASC],
            'attributes' => [
                'id',
                'name' => [
                    'asc' => ['space.name' => SORT_ASC],
                    'desc' => ['space.name' => SORT_DESC],
                    'default' => SORT_ASC
                ],
            ]
        ]);
        $params['sort'] = isset($params['sort']) ? $params['sort'] : 'name';
        if($params['sort'] == 'name')
            $query->addOrderBy(new Expression('cast(space.name as unsigned) ASC'));
        elseif($params['sort'] == '-name')
            $query->addOrderBy(new Expression('cast(space.name as unsigned) DESC'));

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['LIKE', 'space.name', $this->name]);

        if($this->_levelName){
            $query->innerJoinWith([
                'level' => function($query){
                    $query->andFilterWhere(['=', 'level.name', $this->_levelName]);
                }
            ]);
        }

        return $dataProvider;
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
                'levelName' => 'Этаж',
            ]
        );
    }

    public function getLevelName(){
        if($this->_levelName)
            return $this->_levelName;
        $level = $this->level;
        return $level ? $level->name : null;
    }

    public function setLevelName($value){
        $this->_levelName = $value;
    }

    public function getMainOptionName(){
        if($this->_mainOptionName)
            return $this->_mainOptionName;
        $mainOption = $this->mainOption;
        return $mainOption ? $mainOption->name : null;
    }

    public function setShopTypeName($value){
        $this->_mainOptionName = $value;
    }
} 