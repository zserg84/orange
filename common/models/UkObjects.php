<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uk_objects".
 *
 * @property integer $id
 * @property integer $uk_id
 * @property string $address
 * @property integer $image_id
 *
 * @property Image $image
 * @property Uk $uk
 */
class UkObjects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uk_objects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uk_id', 'address'], 'required'],
            [['uk_id', 'image_id'], 'integer'],
            [['address'], 'string', 'max' => 255],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id']],
            [['uk_id'], 'exist', 'skipOnError' => true, 'targetClass' => Uk::className(), 'targetAttribute' => ['uk_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uk_id' => 'Uk ID',
            'address' => 'Address',
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
     * @return \yii\db\ActiveQuery
     */
    public function getUk()
    {
        return $this->hasOne(Uk::className(), ['id' => 'uk_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\UkObjectsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UkObjectsQuery(get_called_class());
    }
}
