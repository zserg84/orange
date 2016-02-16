<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uk".
 *
 * @property integer $id
 * @property string $name
 * @property string $properties
 * @property string $phone
 * @property string $email
 * @property string $address
 *
 * @property UkObjects[] $ukObjects
 * @property UkServices[] $ukServices
 */
class Uk extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uk';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['properties'], 'string'],
            [['name', 'phone', 'email', 'address'], 'string', 'max' => 255],
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
            'properties' => 'Properties',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUkObjects()
    {
        return $this->hasMany(UkObjects::className(), ['uk_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUkServices()
    {
        return $this->hasMany(UkServices::className(), ['uk_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\UkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UkQuery(get_called_class());
    }
}
