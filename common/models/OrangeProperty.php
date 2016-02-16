<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orange_property".
 *
 * @property integer $id
 * @property string $text
 */
class OrangeProperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orange_property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'text',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\OrangePropertyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\OrangePropertyQuery(get_called_class());
    }
}
