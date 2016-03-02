<?php

namespace common\models;

use Yii;
use common\models\query\LevelQuery;
/**
 * This is the model class for table "level".
 *
 * @property integer $id
 * @property string $name
 * @property integer $image_id
 *
 * @property Image $image
 * @property Space[] $spaces
 */
class Level extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['image_id'], 'integer'],
            [['name'], 'string', 'max' => 32],
            [['name'], 'unique', 'filter' => function($query){
                if($this->id)
                    $query->andWhere(['<>', 'level.id', $this->id]);
            }],
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
     * @return \yii\db\ActiveQuery
     */
    public function getSpaces()
    {
        return $this->hasMany(Space::className(), ['level_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return LevelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LevelQuery(get_called_class());
    }
}
