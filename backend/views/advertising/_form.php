<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\fileinput\BootstrapFileInput;
use kartik\switchinput\SwitchInput;

?>
<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => true,
//    'enableClientValidation' => true,
    'options' => [
        'id' => 'level_form',
        'enctype' => 'multipart/form-data',
    ]
]); ?>
<?php $box->beginBody(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'name', ['options' => ['class' => 'form-group']])?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?
            $initialPreview = [];
            $previewConfig = [];
            $image = $formModel->image;
            if($image){
                $initialPreview[] = '<img src="'.$image->getSrc().'" alt="" class="file-preview-image">';
                $previewConfig[] = [
//                    'url' => Url::toRoute(['image-delete']),
//                    'key' => $image->id,
                ];
            }
            ?>
            <?= $form->field($formModel, 'image')->widget(BootstrapFileInput::className(), [
                'options' => ['accept' => 'image/*'],
                'clientOptions' => [
                    'browseClass' => 'btn btn-success',
                    'uploadClass' => 'btn btn-info',
                    'removeClass' => 'btn btn-danger',
                    'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> ',
                    'showUpload' => false,
                    'initialPreview' => $initialPreview,
                    'initialPreviewConfig' => $previewConfig,
                    'showRemove' => false,
                ]
            ])->error(false)->label($formModel->getAttributeLabel('image'));?>
        </div>
    </div>

<?php $box->endBody(); ?>
<?php $box->beginFooter(); ?>
<?= Html::submitButton('Сохранить',
    [
        'class' => $model->isNewRecord ? 'btn btn-primary btn-large' : 'btn btn-success btn-large'
    ]
) ?>
<?php $box->endFooter(); ?>
<?php ActiveForm::end(); ?>