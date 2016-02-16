<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\fileinput\BootstrapFileInput;
use kartik\switchinput\SwitchInput;
use backend\models\Level;
use backend\models\SellOption;
?>
<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => true,
//    'enableClientValidation' => true,
    'options' => [
        'id' => 'space_form',
    ]
]); ?>
<?php $box->beginBody(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'level_id')->dropDownList(ArrayHelper::map(Level::find()->all(), 'id', 'name'))?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'name')?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'area')?>
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