<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 11.02.16
 * Time: 15:00
 */

namespace backend\controllers;


use backend\models\form\MainGalleryForm;
use common\actions\DeleteAction;
use common\models\Image;
use common\models\MainGallery;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

class MainGalleryController extends Controller
{
    public function actions()
    {
        return [
            'image-delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Image::className(),
                'modelIdName' => 'key',
                'redirectUrl' => false,
            ],
        ];
    }

    public function actionUpdate(){
        $form = new MainGalleryForm();

        if($post = \Yii::$app->getRequest()->post()) {
            if ($form->load($post) && $form->validate()) {
                $images = UploadedFile::getInstances($form, 'images');
                if($images){
                    foreach($images as $image){
                        $form->image = $image;
                        if ($imageModel = $form->getImageModel('image')) {
                            $mg = MainGallery::find()->where([
                                'image_id' => $imageModel->id,
                            ])->one();
                            $mg = $mg ? $mg : new MainGallery();
                            $mg->image_id = $imageModel->id;
                            $mg->save();
                        }
                    }
                }
            }
        }
        $images = MainGallery::find()->all();
        $form->images = $images;
        return $this->render('update', [
            'model' => $form,
        ]);
    }
} 