<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 11.02.16
 * Time: 15:04
 */

namespace backend\models\form;


use common\behaviors\ImageBehavior;
use yii\base\Model;

class MainGalleryForm extends Model
{

    public $images = [];
    public $image;

    public function rules() {
        return [
            [['image'], 'safe'],
        ];
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