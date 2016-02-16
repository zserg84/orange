<?php
use backend\widgets\spaceImage\SpaceImageWidget;
use backend\web\theme\widgets\Box;

$this->title = 'Управляющая компания';
$this->params['subtitle'] = 'Редактирование';
$this->params['breadcrumbs'] = [
    [
        'label' => $this->title,
        'url' => ['index'],
    ],
    $this->params['subtitle']
];
$boxButtons = ['{cancel}'];

$boxButtons = !empty($boxButtons) ? implode(' ', $boxButtons) : null; ?>
<div class="row">
    <div class="col-sm-12">
        <?php $box = Box::begin(
            [
                'title' => $this->params['subtitle'],
                'renderBody' => false,
                'options' => [
                    'class' => 'box-success'
                ],
                'bodyOptions' => [
                    'class' => 'table-responsive'
                ],
                'buttonsTemplate' => $boxButtons,
            ]
        );
        echo $this->render(
            '_form',
            [
                'formModel' => $model,
                'box' => $box
            ]
        );
        Box::end(); ?>
    </div>
</div>