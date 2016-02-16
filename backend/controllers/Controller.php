<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 08.09.15
 * Time: 13:43
 */

namespace backend\controllers;


use yii\filters\AccessControl;
use yii\web\HttpException;

class Controller extends \yii\web\Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['accessBackend']
                    ]
                ]
            ]
        ];
    }

    protected function _findModel($modelName, $id)
    {
        if (is_array($id)) {
            $model = $modelName::findAll($id);
        } else {
            $model = $modelName::findOne($id);
        }
        if ($model !== null) {
            return $model;
        } else {
            throw new HttpException(404);
        }
    }
} 