<?php

namespace common\models;

use Yii;
use common\models\query\SpaceQuery;
/**
 * This is the model class for table "space".
 *
 * @property integer $id
 * @property string $name
 * @property integer $level_id
 * @property integer $tenant_id
 * @property float $area
 * @property float $x1
 * @property float $y1
 * @property float $x2
 * @property float $y2
 * @property float $x3
 * @property float $y3
 * @property float $x4
 * @property float $y4
 * @property float $x5
 * @property float $y5
 * @property float $x6
 * @property float $y6
 * @property float $x7
 * @property float $y7
 * @property float $x8
 * @property float $y8
 *
 * @property Level $level
 * @property Tenant[] $tenant
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
            [['level_id', 'tenant_id'], 'integer'],
            [['area', 'x1', 'y1', 'x2', 'y2', 'x3', 'y3', 'x4', 'y4', 'x5', 'y5', 'x6', 'y6', 'x7', 'y7', 'x8', 'y8'], 'number'],
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
            'name' => 'Наименование',
            'level_id' => 'Этаж',
            'tenant_id' => 'Арендатор',
            'area' => 'Площадь, кв.м',
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
    public function getTenant()
    {
        return $this->hasOne(Tenant::className(), ['id' => 'tenant_id']);
    }

    /**
     * @inheritdoc
     * @return SpaceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SpaceQuery(get_called_class());
    }

    public function getCoords(){
        $coords = '';
        for($i=1;$i<=8;$i++){
            $coords .= $coords ? ', ': '';
            $coords .= $this->{'x'.$i}.','.$this->{'y'.$i};
        }
        return $coords;
    }
}
