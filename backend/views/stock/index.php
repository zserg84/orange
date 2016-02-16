<?php

use backend\web\theme\widgets\Box;
use yii\helpers\Html;
use yii\grid\ActionColumn;
use backend\web\theme\widgets\GridView;
use yii\grid\CheckboxColumn;
use yii\helpers\Url;
use common\models\Tenant;
use yii\helpers\ArrayHelper;
use common\models\Stock;
use yii\jui\DatePicker;

$this->title = 'Акции';
$this->params['subtitle'] = 'Список';
$this->params['breadcrumbs'] = [
    $this->title
];

$gridId = 'stock-grid';
$gridConfig = [
    'id' => $gridId,
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => CheckboxColumn::classname()
        ],
        'name',
        [
            'attribute' => 'tenantName',
            'filter' => Html::activeDropDownList(
                $searchModel,
                'tenantName',
                ArrayHelper::map(Tenant::find()->orderBy('name')->all(), 'id', 'name'),
                [
                    'class' => 'form-control',
                    'prompt' => 'Выберите'
                ]
            )
        ],
        [
            'attribute' => 'status',
            'filter' => Html::activeDropDownList(
                $searchModel,
                'status',
                Stock::statuses(),
                [
                    'class' => 'form-control',
                    'prompt' => 'Выберите'
                ]
            )
        ],
        [
            'attribute' => 'date_end',
            'filter' => DatePicker::widget(
                [
                    'model' => $searchModel,
                    'attribute' => 'date_end',
                    'options' => [
                        'class' => 'form-control'
                    ],
                    'clientOptions' => [
                        'dateFormat' => 'dd.mm.yy',
                    ]
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