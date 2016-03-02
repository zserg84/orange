<?php

namespace common\models;

use Yii;
use common\models\query\StockQuery;
/**
 * This is the model class for table "stock".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $photo_image_id
 * @property integer $tenant_id
 * @property string $date_end
 *
 * @property Tenant $tenant
 * @property Image $photoImage
 * @property Image $minPhotoImage
 */
class Stock extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_ARCHIVE = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['photo_image_id', 'tenant_id'], 'integer'],
            [['date_end'], 'safe'],
            [['name'], 'string', 'max' => 64],
            [['tenant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tenant::className(), 'targetAttribute' => ['tenant_id' => 'id']],
            [['photo_image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['photo_image_id' => 'id']],
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
            'description' => 'Description',
            'photo_image_id' => 'Photo Image ID',
            'tenant_id' => 'Tenant ID',
            'date_end' => 'Date End',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTenant()
    {
        return $this->hasOne(Tenant::className(), ['id' => 'tenant_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotoImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'photo_image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMinPhotoImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'min_photo_image_id']);
    }

    /**
     * @inheritdoc
     * @return StockQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StockQuery(get_called_class());
    }

    public function statuses(){
        return [
            self::STATUS_ACTIVE => 'Активный',
            self::STATUS_ARCHIVE => 'Архив',
        ];
    }

    public function statusValue($status){
        $statuses = $this->statuses();
        return $statuses[$status];
    }
}
