<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use dosamigos\fileinput\BootstrapFileInput;
?>
<?php $form = ActiveForm::begin([
    'options' => [
        'id' => 'main_gallery_form',
        'enctype' => 'multipart/form-data',
    ]
]); ?>
<?php $box->beginBody(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?
            $initialPreview = [];
            $previewConfig = [];
            if($formModel->images){
                foreach($formModel->images as $eventImage){
                    $image = $eventImage->image;
                    $initialPreview[] = '<img src="'.$image->getSrc().'" alt="" class="file-preview-image">';
                    $previewConfig[] = [
                        'url' => Url::toRoute(['image-delete']),
                        'key' => $image->id,
                    ];
                }
            }
            ?>
            <?= $form->field($formModel, 'images[]')->widget(BootstrapFileInput::className(), [
                'options' => [
                    'accept' => 'image/*',
                    'multiple' => true,
                    'class' => 'js_input_change_cover_multiple',
                ],
                'clientOptions' => [
                    'browseClass' => 'btn btn-success',
                    'uploadClass' => 'btn btn-info',
                    'removeClass' => 'btn btn-danger',
                    'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> ',
                    'showUpload' => false,
                    'initialPreview' => $initialPreview,
                    'initialPreviewConfig' => $previewConfig,
                    'showRemove' => false,
                    'overwriteInitial' => false,
                ]
            ])->error(false)->label(false);?>
        </div>
    </div>

<?php $box->endBody(); ?>
<?php $box->beginFooter(); ?>
<?= Html::submitButton('Сохранить',
    [
        'class'=>'btn btn-success btn-large'
    ]
) ?>
<?php $box->endFooter(); ?>
<?php ActiveForm::end(); ?>