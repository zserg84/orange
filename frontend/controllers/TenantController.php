<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 10.02.16
 * Time: 13:25
 */

namespace frontend\controllers;


use common\models\Space;
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

    public function actionInfo( $spaceId){
        $space = Space::findOne($spaceId);
        $tenant = Tenant::findOne($space->tenant_id);
        if(!$space->tenant_id || ($tenant && $tenant->name == 'Свободно'))
            return $this->renderAjax('info_empty', [
                'space' => $space,
                'tenant' => $tenant,
            ]);

        if(!$tenant)
            return 'Unknown tenant';
        return $this->renderAjax('info', [
            'tenant' => $tenant,
            'space' => $space,
        ]);
    }
} 