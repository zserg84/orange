<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "lang".
 *
 * @property integer $id
 * @property string $url
 * @property string $local
 * @property string $name
 * @property integer $default
 * @property integer $created_at
 * @property integer $updated_at
 */
class Lang extends \yii\db\ActiveRecord
{
    /**
     * Переменная, для хранения текущего объекта языка
     */
    public static $current = null;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'local', 'name', 'created_at', 'updated_at'], 'required'],
            [['default', 'created_at', 'updated_at'], 'integer'],
            [['url'], 'string', 'max' => 5],
            [['local'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'local' => 'Local',
            'name' => 'Язык',
            'default' => 'По-умолчанию',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            'timestampBehavior' => [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\LangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LangQuery(get_called_class());
    }

    /**
     * Получение текущего объекта языка
     * @return Lang | ActiveRecord
     */
    static function getCurrent()
    {
        if( self::$current === null ){
            self::$current = self::getDefaultLang();
        }
        return self::$current;
    }

    /**
     * Установка текущего объекта языка и локаль пользователя
     */
    static function setCurrent($url = null)
    {
        $language = self::getLangByUrl($url);
        if($language === null){
            $language = Yii::$app->session->get('language');
        }
        self::$current = ($language === null) ? self::getDefaultLang() : $language;
        Yii::$app->session->set('language', self::$current);
        Yii::$app->language = self::$current->local;
    }

    /**
     * Получения объекта языка по умолчанию
     * @return Lang | ActiveRecord
     */
    static function getDefaultLang()
    {
        return Lang::find()->where('`default` = :default', [':default' => 1])->one();
    }

    /**
     * Получения объекта языка по буквенному идентификатору
     */
    static function getLangByUrl($url = null)
    {
        if ($url === null) {
            return null;
        } else {
            $language = Lang::find()->where('url = :url', [':url' => $url])->one();
            if ( $language === null ) {
                return null;
            }else{
                return $language;
            }
        }
    }

    /**
     * Возвращает список всех языков
     * @param string $fieldVal
     * @param string $filedKey
     * @return array
     */
    public static function getArr($fieldVal='name', $filedKey='id') {
        $list = self::find()->all();
        return ($list) ? ArrayHelper::map($list, $filedKey, $fieldVal) : [];
    }
}
