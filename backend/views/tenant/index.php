<?php

use backend\web\theme\widgets\Box;
use yii\helpers\Html;
use yii\grid\ActionColumn;
use backend\web\theme\widgets\GridView;
use yii\grid\CheckboxColumn;
use yii\helpers\Url;
use common\models\Level;
use yii\helpers\ArrayHelper;
use common\models\GoodsCategory;

$this->title = 'Арендаторы';
$this->params['subtitle'] = 'Список';
$this->params['breadcrumbs'] = [
    $this->title
];

$gridId = 'tenant-grid';
$gridConfig = [
    'id' => $gridId,
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => CheckboxColumn::classname()
        ],
        'name',
        /*[
            'attribute' => 'levelName',
            'filter' => Html::activeDropDownList(
                $searchModel,
                'levelName',
                ArrayHelper::map(Level::find()->orderBy('name')->all(), 'id', 'name'),
                [
                    'class' => 'form-control',
                    'prompt' => 'Выберите'
                ]
            )
        ],*/
        [
            'attribute' => 'categoryName',
            'filter' => Html::activeDropDownList(
                $searchModel,
                'categoryName',
                ArrayHelper::map(GoodsCategory::find()->orderBy('name')->all(), 'id', 'name'),
                [
                    'class' => 'form-control',
                    'prompt' => 'Выберите'
                ]
            )
        ],
    ]
];

$boxButtons = $actions = [];

$boxButtons[] = '{create}';
$boxButtons[] = '{batch-delete}';

$actions[] = '{update}';
$actions[] = '{delete}';

$showActions = true;

$gridButtons = [];

if ($showActions === true) {
    $gridConfig['columns'][] = [
        'class' => ActionColumn::className(),
        'template' => implode(' ', $actions),
        'buttons'=>$gridButtons,
    ];
}

$boxButtons = !empty($boxButtons) ? implode(' ', $boxButtons) : null; ?>

<div class="row">
    <div class="col-xs-12">
        <?php Box::begin(
            [
                'title' => $this->params['subtitle'],
                'bodyOptions' => [
                    'class' => 'table-responsive'
                ],
                'buttonsTemplate' => $boxButtons,
                'grid' => $gridId,
            ]
        ); ?>
        <?=  GridView::widget($gridConfig);?>
        <?php Box::end(); ?>
    </div>
</div>