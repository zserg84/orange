<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "goods_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $color
 *
 * @property Tenant[] $tenants
 */
class GoodsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 64],
            [['color'], 'string', 'max' => 16],
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
            'color' => 'Color',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTenants()
    {
        return $this->hasMany(Tenant::className(), ['goods_category_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\GoodsCategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\GoodsCategoryQuery(get_called_class());
    }
}
