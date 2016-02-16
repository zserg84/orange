<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 11.02.16
 * Time: 10:40
 */

namespace backend\models\form;


use common\behaviors\ImageBehavior;
use common\models\Stock;

class StockForm extends Stock
{
    public $minPhotoImage;
    public $photoImage;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['minPhotoImage', 'photoImage'], 'file', 'mimeTypes'=> ['image/png', 'image/jpeg', 'image/gif'], 'wrongMimeType' => 'Недопустимый тип файла'],
        ]);
    }

    public function behaviors()
    {
        return [
            'imageBehavior' => [
                'class' => ImageBehavior::className(),
            ]
        ];
    }

    public function attributeLabels(){
        return array_merge(parent::attributeLabels(), [
            'minPhotoImage' => 'Маельнькое фото',
            'photoImage' => 'Фото'
        ]);
    }
} 