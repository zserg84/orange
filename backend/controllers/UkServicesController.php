<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 11.02.16
 * Time: 13:14
 */

namespace backend\controllers;

use backend\models\search\UkServicesSearch;
use common\actions\BatchDeleteAction;
use common\actions\CreateAction;
use common\actions\DeleteAction;
use common\actions\IndexAction;
use common\actions\UpdateAction;
use common\models\Uk;
use common\models\UkServices;
use yii\helpers\Url;
use yii\helpers\VarDumper;

class UkServicesController extends Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'modelClass' => UkServicesSearch::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => UkServices::className(),
                'ajaxValidation' => true,
                'redirectUrl' => Url::toRoute('index'),
                'beforeValidate' => function($model, $formModel){
                    $uk = Uk::find()->one();
                    if($uk)
                        $formModel->uk_id = $uk->id;
                    return $formModel;
                }
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => UkServices::className(),
                'formModelClass' => UkServices::className(),
                'redirectUrl' => Url::toRoute('index'),
                'ajaxValidation' => true,
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => UkServices::className(),
                'redirectUrl' => Url::toRoute(['index']),
            ],
            'batch-delete' => [
                'class' => BatchDeleteAction::className(),
                'modelClass' => UkServices::className(),
            ],
        ];
    }
} 