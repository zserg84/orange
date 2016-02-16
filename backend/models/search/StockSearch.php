<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 11.02.16
 * Time: 10:32
 */

namespace backend\models\search;


use common\models\Stock;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;

class StockSearch extends Stock
{

    private $_tenantName;
    private $_status;

    public function rules(){
        return [
            [['name', 'tenantName', 'date_end', 'status'], 'safe'],
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

        $query->andFilterWhere(['LIKE', 'stock.name', $this->name]);
        $query->andFilterWhere(['=', 'stock.tenant_id', $this->_tenantName]);
        if($this->_status){
            if($this->_status == self::STATUS_ACTIVE){
                $query->active();
            }
            else{
                $query->archive();
            }
        }

        if($this->date_end){
            $dateEnd = date('Y-m-d', strtotime($this->date_end));
            $query->andWhere([
                'date_end' => $dateEnd
            ]);
        }
        return $dataProvider;
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
                'tenantName' => 'Арендатор',
                'status' => 'Статус',
            ]
        );
    }

    public function getTenantName(){
        if($this->_tenantName)
            return $this->_tenantName;
        $tenant = $this->tenant;
        return $tenant ? $tenant->name : null;
    }

    public function setTenantName($value){
        $this->_tenantName = $value;
    }

    public function getStatus(){
        if($this->_status)
            return $this->_status;
        if($this->date_end && $this->_status !== ''){
            $curDate = date('d.m.Y');
            if($curDate > $this->date_end){
                return self::statusValue(self::STATUS_ARCHIVE);
            }
            return self::statusValue(self::STATUS_ACTIVE);
        }
    }

    public function setStatus($value){
        $this->_status = $value;
    }
} 