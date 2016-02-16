<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 11.02.16
 * Time: 12:01
 */

namespace backend\controllers;

use backend\models\form\AdvertisingForm;
use backend\models\search\AdvertisingSearch;
use common\actions\BatchDeleteAction;
use common\actions\CreateAction;
use common\actions\DeleteAction;
use common\actions\IndexAction;
use common\actions\UpdateAction;
use common\models\Advertising;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\UploadedFile;

class AdvertisingController extends Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'modelClass' => AdvertisingSearch::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Advertising::className(),
                'formModelClass' => AdvertisingForm::className(),
                'ajaxValidation' => true,
                'redirectUrl' => Url::toRoute('index'),
                'afterAction' => function($action, $model, $formModel) {
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Advertising::className(),
                'formModelClass' => AdvertisingForm::className(),
                'redirectUrl' => Url::toRoute('index'),
                'ajaxValidation' => true,
                'beforeAction' => function($model, $formModel){
                    $formModel->image = $model->image;
                    return $formModel;
                },
                'afterAction' => function($action, $model, $formModel){
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Advertising::className(),
                'redirectUrl' => Url::toRoute(['index']),
            ],
            'batch-delete' => [
                'class' => BatchDeleteAction::className(),
                'modelClass' => Advertising::className(),
            ],
        ];
    }

    public function afterEdit($action, $model, $formModel)
    {
        $image = UploadedFile::getInstance($formModel, 'image');
        $formModel->image = $image;
        if ($image = $formModel->getImageModel('image')) {
            $model->image_id = $image->id;
            $model->save();
        }

        return $model;
    }
} 