<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "space".
 *
 * @property integer $id
 * @property string $name
 * @property integer $level_id
 * @property float $area
 *
 * @property Level $level
 * @property Tenant[] $tenants
 */
class Space extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'space';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'level_id'], 'required'],
            [['level_id'], 'integer'],
            [['area'], 'number'],
            [['name'], 'string', 'max' => 32],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => Level::className(), 'targetAttribute' => ['level_id' => 'id']],
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
            'level_id' => 'Level ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(Level::className(), ['id' => 'level_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTenants()
    {
        return $this->hasMany(Tenant::className(), ['space_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return SpaceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SpaceQuery(get_called_class());
    }
}
