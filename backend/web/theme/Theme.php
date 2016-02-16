<?php

namespace backend\web\theme;

use Yii;

/**
 * Class Theme
 * @package vova07\themes\admin
 */
class Theme extends \yii\base\Theme
{
    /**
     * @inheritdoc
     */
    public $pathMap = [
        '@backend/views' => '@backend/web/theme/views',
        '@backend/modules' => '@backend/web/theme/modules'
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapAsset'] = [
            'sourcePath' => '@backend/web/theme/assets',
            'css' => [
                'css/bootstrap.min.css'
            ]
        ];
        Yii::$app->assetManager->bundles['yii\bootstrap\BootstrapPluginAsset'] = [
            'sourcePath' => '@backend/web/theme/assets',
            'js' => [
                'js/bootstrap.min.js'
            ]
        ];
        Yii::$container->set('yii\grid\CheckboxColumn', [
            'checkboxOptions' => [
                'class' => 'simple'
            ]
        ]);
    }
}
