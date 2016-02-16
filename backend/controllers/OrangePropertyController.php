<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 11.02.16
 * Time: 11:50
 */

namespace backend\controllers;


use common\models\OrangeProperty;

class OrangePropertyController extends Controller
{

    public function actionUpdate(){
        $model = OrangeProperty::find()->one();
        $model = $model ? $model : new OrangeProperty();

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