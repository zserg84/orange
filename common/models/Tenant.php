<?php

namespace common\models;

use Yii;
use common\models\query\TenantQuery;

/**
 * This is the model class for table "tenant".
 *
 * @property integer $id
 * @property string $name
 * @property integer $logo_image_id
 * @property integer $goods_category_id
 * @property string $work_time
 * @property string $description
 * @property integer $photo_image_id
 * @property string $phone
 * @property string $site
 *
 * @property Space[] $spaces
 * @property Stock[] $stocks
 * @property GoodsCategory $goodsCategory
 * @property Image $logoImage
 * @property Image $photoImage
 */
class Tenant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tenant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['logo_image_id', 'goods_category_id', 'photo_image_id'], 'integer'],
            [['description'], 'string'],
            [['name', 'phone'], 'string', 'max' => 64],
            [['work_time', 'site'], 'string', 'max' => 255],
            [['goods_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => GoodsCategory::className(), 'targetAttribute' => ['goods_category_id' => 'id']],
            [['logo_image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['logo_image_id' => 'id']],
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
            'name' => 'Наименование',
            'logo_image_id' => 'Логотип',
            'goods_category_id' => 'Категория товаров',
            'work_time' => 'Время работы',
            'description' => 'Описание',
            'photo_image_id' => 'Фото',
            'site' => 'Сайт',
            'phone' => 'Телефон',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpaces()
    {
        return $this->hasMany(Space::className(), ['tenant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::className(), ['tenant_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoodsCategory()
    {
        return $this->hasOne(GoodsCategory::className(), ['id' => 'goods_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLogoImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'logo_image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotoImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'photo_image_id']);
    }

    /**
     * @inheritdoc
     * @return TenantQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TenantQuery(get_called_class());
    }
}
