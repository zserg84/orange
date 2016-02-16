<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\fileinput\BootstrapFileInput;
use kartik\switchinput\SwitchInput;

?>
<?php $form = ActiveForm::begin([
    'options' => [
        'id' => 'uk_services_form',
        'enctype' => 'multipart/form-data',
    ]
]); ?>
<?php $box->beginBody(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'name', ['options' => ['class' => 'form-group']])?>
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