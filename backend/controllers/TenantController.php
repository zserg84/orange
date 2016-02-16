<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 10.02.16
 * Time: 14:51
 */

namespace backend\controllers;

use backend\models\form\TenantForm;
use backend\models\search\TenantSearch;
use common\actions\BatchDeleteAction;
use common\actions\CreateAction;
use common\actions\DeleteAction;
use common\actions\IndexAction;
use common\actions\UpdateAction;
use common\models\Tenant;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\UploadedFile;

class TenantController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'modelClass' => TenantSearch::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Tenant::className(),
                'formModelClass' => TenantForm::className(),
                'ajaxValidation' => true,
                'redirectUrl' => Url::toRoute('index'),
                'afterAction' => function($action, $model, $formModel) {
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Tenant::className(),
                'formModelClass' => TenantForm::className(),
                'redirectUrl' => Url::toRoute('index'),
                'ajaxValidation' => true,
                'beforeAction' => function($model, $formModel){
                    $formModel->logoImage = $model->logoImage;
                    $formModel->photoImage = $model->photoImage;
                    return $formModel;
                },
                'afterAction' => function($action, $model, $formModel){
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Tenant::className(),
                'redirectUrl' => Url::toRoute(['index']),
            ],
            'batch-delete' => [
                'class' => BatchDeleteAction::className(),
                'modelClass' => Tenant::className(),
            ],
        ];
    }

    public function afterEdit($action, $model, $formModel)
    {
        $image = UploadedFile::getInstance($formModel, 'logoImage');
        $formModel->logoImage = $image;
        if ($image = $formModel->getImageModel('logoImage')) {
            $model->logo_image_id = $image->id;
        }
        $image = UploadedFile::getInstance($formModel, 'photoImage');
        $formModel->photoImage = $image;
        if ($image = $formModel->getImageModel('photoImage')) {
            $model->photo_image_id = $image->id;
        }
        $model->save();
        return $model;
    }

} 