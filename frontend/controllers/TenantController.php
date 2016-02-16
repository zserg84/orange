<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 10.02.16
 * Time: 13:25
 */

namespace frontend\controllers;


use common\models\Tenant;

class TenantController extends Controller
{

    public function actionCreativityZone(){
        $tenants = Tenant::find()->innerJoinWith([
            'goodsCategory' => function($query){
                $query->andWhere([
                    'goods_category.name' => 'Хобби',
                ]);
            }
        ])->all();
        return $this->render('creativity-zone', [
            'tenants' => $tenants
        ]);
    }

    public function actionView($id){
        $tenant = Tenant::findOne($id);
        return $this->render('view', [
            'tenant' => $tenant
        ]);
    }
} 