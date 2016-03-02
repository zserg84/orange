<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 10.02.16
 * Time: 14:52
 */

namespace backend\models\search;


use common\models\Tenant;
use yii\data\ActiveDataProvider;

class TenantSearch extends Tenant
{
    private $_levelName;
    private $_categoryName;

    public function rules(){
        return [
            [['name', /*'levelName',*/ 'categoryName'], 'safe'],
        ];
    }

    public function attributeLabels(){
        return array_merge(
            parent::attributeLabels(), [
//                'levelName' => 'Этаж',
                'categoryName' => 'Категория товаров',
                'name' => 'Наименование',
            ]
        );
    }

    public function search($params = null)
    {
        $query = self::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'defaultOrder' => ['name'=>SORT_ASC],
            'attributes' => [
                'id',
                'name' => [
                    'asc' => ['tenant.name' => SORT_ASC],
                    'desc' => ['tenant.name' => SORT_DESC],
                    'default' => SORT_ASC
                ],
            ]
        ]);


        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['LIKE', 'tenant.name', $this->name]);

        /*if($this->_levelName){
            $query->innerJoinWith([
                'space' => function($query){
                    $query->andWhere(['space.level_id' => $this->_levelName]);
                }
            ]);
        }*/
        if($this->_categoryName){
            $query->andWhere(['tenant.goods_category_id' => $this->_categoryName]);
        }

        return $dataProvider;
    }


    /*public function getLevelName(){
        if($this->_levelName)
            return $this->_levelName;
        if($space = $this->space){
            return $space->level ? $space->level->name : null;
        }
        return null;
    }

    public function setLevelName($value){
        $this->_levelName = $value;
    }*/

    public function getCategoryName(){
        if($this->_categoryName)
            return $this->_categoryName;
        return $this->goodsCategory ? $this->goodsCategory->name : null;
    }

    public function setCategoryName($value){
        $this->_categoryName = $value;
    }
} 