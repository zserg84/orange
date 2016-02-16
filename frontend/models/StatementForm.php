<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 30.09.15
 * Time: 15:40
 */

namespace frontend\models;


use common\models\SellOption;
use common\models\SellOptionCategory;
use yii\base\Model;
use yii\helpers\VarDumper;

class StatementForm extends Model
{

    public $name;
    public $phone;
    public $space;
    public $area;
    public $hiddenWhere;

    const FORM_FROM_SITE = 1;
    const FORM_CALL = 2;
    const FORM_FILTER_BUSINESS_PURCHASE = 3;
    const FORM_FILTER_PURCHASE = 4;
    const FORM_FILTER_RENT = 5;
    const FORM_PURCHASE = 6;
    const FORM_RENT = 7;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['phone', 'filter', 'filter' => function ($value) {
                $value = trim($value, "_");
                return $value;
            }],
            [['name', 'phone'], 'required'],
            [['space', 'area', 'hiddenWhere'], 'safe'],
            [['phone'], 'string', 'length'=>18],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'phone' => 'Телефон',
            'space' => 'Номер помещения',
            'area' => 'Площадь',
        ];
    }

    public function sendEmail()
    {/*
        $email = \Yii::$app->params['supportEmail'];
        $subject = 'Тест';
        $body = 'Тест';
        $mailer = \Yii::$app->get('mailer');
        $logger = new \Swift_Plugins_Loggers_ArrayLogger();
        $mailer->getSwiftMailer()->registerPlugin(new \Swift_Plugins_LoggerPlugin($logger));
        $message = $mailer->compose()
            ->setTo('zserg84@gmail.com')
            ->setFrom(['m10@ukmost.com'=>'asd'])
            ->setSubject($subject)
            ->setTextBody($body);
        if (!$message->send()){
            echo $logger->dump();
            return false;
        }
        else{
            return true;
        }*/
        $message = '
                <html>
                <head>
                    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
                    <meta http-equiv="content-language" content="ru">
                    <meta http-equiv="pragma" content="no-cache">
                    <meta http-equiv="cache-control" content="no-cache">

                    <title></title>
                </head>
                <body>
                <div>
                    <strong>Имя: </strong>
                    <span>'.$this->name.'</span>
                </div>
                <div>
                    <strong>Телефон: </strong>
                    <span>'.$this->phone.'</span>
                </div>';
        if($this->space)
            $message.= '<div>
                <strong>Номер помещения: </strong>
                <span>'.$this->space.'</span>
            </div>';
        if($this->area)
            $message.= '<div>
                <strong>Площадь: </strong>
                <span>'.$this->area.'</span>
            </div>';

        $message .= '</body></html>';
        $from = 'm10@ukmost.com';
        $supportEmail = \Yii::$app->params['supportEmail'];

        if(is_array($supportEmail)){
            $to = $supportEmail[0];
            unset($supportEmail[0]);
            $supportEmail = implode(',', $supportEmail);
        }
        else{
            $to = $supportEmail;
            $supportEmail = '';
        }
        $subject = $this->hiddenWhere ? $this->hiddenWhere : 'Заявка c сайта химок';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= "From:" . $from . "\r\n";
        if($supportEmail){
            $headers .= "Bcc: ". $supportEmail . "\r\n";
        }
        if(mail($to,$subject,$message, $headers)){
            return true;
        }
        else{
            return false;
        }
    }

    public static function formNames(){
        return [
            self::FORM_FROM_SITE => 'Заявка с сайта',
            self::FORM_CALL => 'Заявка на звонок',
            self::FORM_FILTER_BUSINESS_PURCHASE => "Заявка на покупку арендного бизнеса",
            self::FORM_FILTER_PURCHASE => "Заявка на покупку",
            self::FORM_FILTER_RENT => "Заявка на аренду",
            self::FORM_PURCHASE => "Заявка на покупку",
            self::FORM_RENT => "Заявка на аренду",
        ];
    }

    public static function getFormName($name){
        $formNames = self::formNames();
        return $formNames[$name];
    }

    public static function getFormNameByOption($sellOptionId){
        $formNames = self::formNames();
        $sellOption = SellOption::findOne($sellOptionId);
        switch($sellOption->alias){
            case 'purchaseBusiness':
                $name = self::FORM_FILTER_BUSINESS_PURCHASE;
                break;
            case 'purchase':
                $name = self::FORM_FILTER_PURCHASE;
                break;
            case 'rent':
                $name = self::FORM_FILTER_RENT;
                break;
        }
        return $formNames[$name];
    }

    public static function getFormNameByCategory($categoryId){
        $formNames = self::formNames();
        $sellOptionCategory = SellOptionCategory::findOne($categoryId);
        switch($sellOptionCategory->id){
            case 1:
                $name = self::FORM_PURCHASE;
                break;
            case 2:
                $name = self::FORM_RENT;
                break;
        }
        return $formNames[$name];
    }
} 