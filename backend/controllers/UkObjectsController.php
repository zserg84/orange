<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 11.02.16
 * Time: 13:24
 */

namespace backend\controllers;

use backend\models\form\UkObjectsForm;
use backend\models\search\UkObjectsSearch;
use common\actions\BatchDeleteAction;
use common\actions\CreateAction;
use common\actions\DeleteAction;
use common\actions\IndexAction;
use common\actions\UpdateAction;
use common\models\Uk;
use common\models\UkObjects;
use yii\helpers\Url;
use yii\web\UploadedFile;

class UkObjectsController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'modelClass' => UkObjectsSearch::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => UkObjects::className(),
                'formModelClass' => UkObjectsForm::className(),
                'ajaxValidation' => true,
                'redirectUrl' => Url::toRoute('index'),
                'beforeValidate' => function($model, $formModel){
                    $uk = Uk::find()->one();
                    if($uk)
                        $formModel->uk_id = $uk->id;
                    return $formModel;
                },
                'afterAction' => function($action, $model, $formModel) {
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => UkObjects::className(),
                'formModelClass' => UkObjectsForm::className(),
                'redirectUrl' => Url::toRoute('index'),
                'ajaxValidation' => true,
                'beforeAction' => function($model, $formModel){
                    $formModel->image = $model->image;
                    return $formModel;
                },
                'afterAction' => function($action, $model, $formModel) {
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => UkObjects::className(),
                'redirectUrl' => Url::toRoute(['index']),
            ],
            'batch-delete' => [
                'class' => BatchDeleteAction::className(),
                'modelClass' => UkObjects::className(),
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