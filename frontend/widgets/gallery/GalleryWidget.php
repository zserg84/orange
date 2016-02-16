<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 28.09.15
 * Time: 14:25
 */

namespace frontend\widgets\gallery;

use yii\base\Widget;

class GalleryWidget extends Widget
{
    public $images;

    public function run(){
        return $this->render('gallery', [
            'images' => $this->images,
        ]);
    }
}