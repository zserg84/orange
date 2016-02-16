<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "advertising".
 *
 * @property integer $id
 * @property string $name
 * @property integer $image_id
 *
 * @property Image $image
 */
class Advertising extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advertising';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['image_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'name' => 'Name',
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
     * @return \common\models\query\AdvertisingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AdvertisingQuery(get_called_class());
    }
}
