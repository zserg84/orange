<?php

namespace backend\web\theme;

use yii\web\AssetBundle;

/**
 * Theme data tables asset bundle.
 */
class DataTablesAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@backend/web/theme/assets';

    /**
     * @inheritdoc
     */
    public $css = [
        'css/datatables/dataTables.bootstrap.css'
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'backend\web\theme\ThemeAsset'
    ];
}
