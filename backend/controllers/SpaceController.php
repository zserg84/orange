<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 29.09.15
 * Time: 12:54
 */

namespace backend\controllers;

use backend\models\form\SpaceForm;
use backend\models\search\SpaceSearch;
use backend\models\Space;
use common\actions\BatchDeleteAction;
use common\actions\CreateAction;
use common\actions\DeleteAction;
use common\actions\IndexAction;
use common\actions\UpdateAction;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class SpaceController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'modelClass' => SpaceSearch::className(),
                'searchParams' => [
                    'level_id' => \Yii::$app->getRequest()->get('levelId'),
                ],
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Space::className(),
                'formModelClass' => SpaceForm::className(),
                'ajaxValidation' => true,
                'redirectUrl' => Url::toRoute('index'),
                'afterAction' => function($action, $model, $formModel) {
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Space::className(),
                'formModelClass' => SpaceForm::className(),
                'redirectUrl' => Url::toRoute('index'),
                'ajaxValidation' => true,
                'beforeAction' => function($model, $formModel){
                    return $formModel;
                },
                'afterAction' => function($action, $model, $formModel){
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Space::className(),
                'redirectUrl' => Url::toRoute(['index']),
            ],
            'batch-delete' => [
                'class' => BatchDeleteAction::className(),
                'modelClass' => Space::className(),
            ],
        ];
    }

    public function afterEdit($action, $model, $formModel)
    {

        return $model;
    }
} 