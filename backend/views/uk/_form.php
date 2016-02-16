<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use vova07\imperavi\Widget as Imperavi;
?>
<?php $form = ActiveForm::begin([
    'options' => [
        'id' => 'uk_form',
    ]
]); ?>
<?php $box->beginBody(); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'name'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'properties')->widget(
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
            <?= $form->field($formModel, 'phone'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'email'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'address'); ?>
        </div>
    </div>

<?php $box->endBody(); ?>
<?php $box->beginFooter(); ?>
<?= Html::submitButton('Сохранить',
    [
        'class'=>'btn btn-primary btn-large'
    ]
) ?>
<?php $box->endFooter(); ?>
<?php ActiveForm::end(); ?>