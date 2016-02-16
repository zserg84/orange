<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 11.02.16
 * Time: 13:27
 */

namespace backend\models\form;


use common\behaviors\ImageBehavior;
use common\models\UkObjects;

class UkObjectsForm extends UkObjects
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