<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 29.09.15
 * Time: 11:40
 */

namespace backend\controllers;

use backend\models\form\LevelForm;
use backend\models\Level;
use backend\models\search\LevelSearch;
use common\actions\BatchDeleteAction;
use common\actions\CreateAction;
use common\actions\DeleteAction;
use common\actions\IndexAction;
use common\actions\UpdateAction;
use common\models\Image;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

class LevelController extends Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'modelClass' => LevelSearch::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Level::className(),
                'formModelClass' => LevelForm::className(),
                'ajaxValidation' => true,
                'redirectUrl' => Url::toRoute('index'),
                'beforeValidate' => function($model, $formModel){
                    return $formModel;
                },
                'afterAction' => function($action, $model, $formModel) {
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Level::className(),
                'formModelClass' => LevelForm::className(),
                'redirectUrl' => Url::toRoute('index'),
                'ajaxValidation' => true,
                'beforeAction' => function($model, $formModel){
                    $formModel->image = $model->image;
                    return $formModel;
                },
                'beforeValidate' => function($model, $formModel){
                    return $formModel;
                },
                'afterAction' => function($action, $model, $formModel){
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Level::className(),
                'redirectUrl' => Url::toRoute(['index']),
            ],
            'batch-delete' => [
                'class' => BatchDeleteAction::className(),
                'modelClass' => Level::className(),
            ],
            'image-delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Image::className(),
                'modelIdName' => 'key',
                'redirectUrl' => false,
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