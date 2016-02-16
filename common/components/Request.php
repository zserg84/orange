<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 11.09.15
 * Time: 12:11
 */
namespace common\components;

use yii\web\NotFoundHttpException;

class Request extends \yii\web\Request

{

    public $web;
    public $adminUrl;

    public function getBaseUrl()
    {
        return str_replace($this->web, "", parent::getBaseUrl()) . $this->adminUrl;
    }



    public function resolvePathInfo()
    {
        if ($this->getUrl() === $this->adminUrl) {
            return "";
        } else {
            return parent::resolvePathInfo();
        }
    }

    public function resolve()
    {
        $result = \Yii::$app->getUrlManager()->parseRequest($this);
        if ($result !== false) {
            list ($route, $params) = $result;
            if ($this->_queryParams === null) {
                $_GET = $params + $_GET; // preserve numeric keys
            } else {
                $this->_queryParams = $params + $this->_queryParams;
            }
            return [$route, $this->getQueryParams()];
        } else {
            throw new NotFoundHttpException(\Yii::t('yii', 'Page not found.'));
        }
    }

}