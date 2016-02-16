<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 10.02.16
 * Time: 12:24
 */

namespace frontend\controllers;


use common\models\Stock;
use yii\base\Exception;

class StockController extends Controller
{

    public function actionIndex(){
        $stocks = Stock::find()->orderBy('id')->all();

        return $this->render('index', [
            'stocks' => $stocks,
        ]);
    }

    public function actionView($id){
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function findModel($id){
        $model = Stock::findOne($id);
        if(!$model)
            throw new Exception('Model was not found');
        return $model;
    }
} 