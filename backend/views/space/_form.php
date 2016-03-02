<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Tenant;
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
            <?= $form->field($formModel, 'tenant_id')->dropDownList(ArrayHelper::map(Tenant::find()->all(), 'id', 'name'), [
                'prompt' => 'Выберите аредатора',
            ])?>
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
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'x1')?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($formModel, 'y1')?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'x2')?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($formModel, 'y2')?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'x3')?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($formModel, 'y3')?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'x4')?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($formModel, 'y4')?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'x5')?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($formModel, 'y5')?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'x6')?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($formModel, 'y6')?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'x7')?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($formModel, 'y7')?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'x8')?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($formModel, 'y8')?>
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