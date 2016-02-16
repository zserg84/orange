<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 09.09.15
 * Time: 12:44
 */

namespace frontend\controllers;

use yii\web\NotFoundHttpException;

class Controller extends \yii\web\Controller
{
    public $topMenu;

    public function init(){
        parent::init();
    }

    protected function _findModel($modelName, $id){
        $model = $modelName::findOne($id);
        if(!$model)
            throw new NotFoundHttpException();
        return $model;
    }
} 