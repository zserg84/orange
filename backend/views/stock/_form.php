<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\fileinput\BootstrapFileInput;
use common\models\Tenant;
use yii\jui\DatePicker;
use vova07\imperavi\Widget as Imperavi;
?>
<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => true,
//    'enableClientValidation' => true,
    'options' => [
        'id' => 'stock_form',
        'enctype' => 'multipart/form-data',
    ]
]); ?>
<?php $box->beginBody(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'name')?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'description')->widget(
                Imperavi::className(),
                [
                    'settings' => [
                        'minHeight' => 300,
                    ]
                ]
            ); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'tenant_id')->dropDownList(ArrayHelper::map(Tenant::find()->all(), 'id', 'name'), [
                'prompt' => 'Выберите арендатора',
            ])?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'date_end')->widget(DatePicker::className(), [
                'clientOptions' => [
                    'dateFormat' => 'dd.mm.yy',
                ]
            ])?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?
            $initialPreview = [];
            $previewConfig = [];
            $image = $formModel->minPhotoImage;
            if($image){
                $initialPreview[] = '<img src="'.$image->getSrc().'" alt="" class="file-preview-image">';
                $previewConfig[] = [
//                    'url' => Url::toRoute(['image-delete']),
//                    'key' => $image->id,
                ];
            }
            ?>
            <?= $form->field($formModel, 'minPhotoImage')->widget(BootstrapFileInput::className(), [
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
            ])->error(false);?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?
            $initialPreview = [];
            $previewConfig = [];
            $image = $formModel->photoImage;
            if($image){
                $initialPreview[] = '<img src="'.$image->getSrc().'" alt="" class="file-preview-image">';
                $previewConfig[] = [
//                    'url' => Url::toRoute(['image-delete']),
//                    'key' => $image->id,
                ];
            }
            ?>
            <?= $form->field($formModel, 'photoImage')->widget(BootstrapFileInput::className(), [
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
            ])->error(false);?>
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