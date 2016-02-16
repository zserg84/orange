<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 11.02.16
 * Time: 12:43
 */

namespace backend\controllers;


use common\models\Uk;

class UkController extends Controller
{

    public function actionUpdate(){
        $model = Uk::find()->one();
        $model = $model ? $model : new Uk();

        if($post = \Yii::$app->getRequest()->post()){
            if($model->load($post) && $model->validate() && !\Yii::$app->getRequest()->isAjax){
                if($model->save()){

                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
} 