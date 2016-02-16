<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "main_gallery".
 *
 * @property integer $id
 * @property integer $image_id
 *
 * @property Image $image
 */
class MainGallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main_gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_id'], 'required'],
            [['image_id'], 'integer'],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_id' => 'Image ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\MainGalleryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MainGalleryQuery(get_called_class());
    }
}
