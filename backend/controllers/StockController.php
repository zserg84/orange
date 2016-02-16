<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 10.02.16
 * Time: 17:19
 */

namespace backend\controllers;

use backend\models\form\StockForm;
use backend\models\search\StockSearch;
use common\actions\BatchDeleteAction;
use common\actions\CreateAction;
use common\actions\DeleteAction;
use common\actions\IndexAction;
use common\actions\UpdateAction;
use common\models\Stock;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

class StockController extends Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'modelClass' => StockSearch::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Stock::className(),
                'formModelClass' => StockForm::className(),
                'ajaxValidation' => true,
                'redirectUrl' => Url::toRoute('index'),
                'afterAction' => function($action, $model, $formModel) {
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Stock::className(),
                'formModelClass' => StockForm::className(),
                'redirectUrl' => Url::toRoute('index'),
                'ajaxValidation' => true,
                'beforeAction' => function($model, $formModel){
                    $formModel->photoImage = $model->photoImage;
                    $formModel->minPhotoImage = $model->minPhotoImage;
                    return $formModel;
                },
                'beforeValidate' => function($model, $formModel){
                    $time_end = strtotime($formModel->date_end);
                    $formModel->date_end = date('Y-m-d', $time_end);
                    return $formModel;
                },
                'afterAction' => function($action, $model, $formModel){
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Stock::className(),
                'redirectUrl' => Url::toRoute(['index']),
            ],
            'batch-delete' => [
                'class' => BatchDeleteAction::className(),
                'modelClass' => Stock::className(),
            ],
        ];
    }

    public function afterEdit($action, $model, $formModel)
    {
        $image = UploadedFile::getInstance($formModel, 'minPhotoImage');
        $formModel->minPhotoImage = $image;
        if ($image = $formModel->getImageModel('minPhotoImage')) {
            $model->min_photo_image_id = $image->id;
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