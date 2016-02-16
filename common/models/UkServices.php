<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "uk_services".
 *
 * @property integer $id
 * @property integer $uk_id
 * @property string $name
 *
 * @property Uk $uk
 */
class UkServices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uk_services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uk_id', 'name'], 'required'],
            [['uk_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'name' => 'Name',
        ];
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
     * @return \common\models\query\UkServicesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UkServicesQuery(get_called_class());
    }
}
