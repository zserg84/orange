<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 29.09.15
 * Time: 11:44
 */

namespace backend\models\form;

use backend\models\Level;
use common\behaviors\ImageBehavior;

class LevelForm extends Level
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