<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use vova07\imperavi\Widget as Imperavi;
?>
<?php $form = ActiveForm::begin([
    'options' => [
        'id' => 'property_form',
    ]
]); ?>
<?php $box->beginBody(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'text')->widget(
                Imperavi::className(),
                [
                    'settings' => [
                        'minHeight' => 300,
                    ]
                ]
            ); ?>
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