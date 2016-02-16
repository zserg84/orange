<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 10.02.16
 * Time: 14:58
 */

namespace backend\models\form;


use common\behaviors\ImageBehavior;
use common\models\Tenant;

class TenantForm extends Tenant
{

    public $logoImage;
    public $photoImage;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['logoImage', 'photoImage'], 'file', 'mimeTypes'=> ['image/png', 'image/jpeg', 'image/gif'], 'wrongMimeType' => 'Недопустимый тип файла'],
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
            'logoImage' => 'Логотип',
            'photoImage' => 'Фото'
        ]);
    }
} 