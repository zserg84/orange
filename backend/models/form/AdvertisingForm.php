<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 11.02.16
 * Time: 12:03
 */

namespace backend\models\form;


use common\behaviors\ImageBehavior;
use common\models\Advertising;

class AdvertisingForm extends Advertising
{

    public $image;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['image'], 'file', 'mimeTypes'=> ['image/png', 'image/jpeg', 'image/gif'], 'wrongMimeType' => 'Недопустимый тип файла'],
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
} 