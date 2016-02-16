<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Введите логин и пароль'; ?>
<div class="form-box" id="login-box">
    <div class="header"><?php echo Html::encode($this->title); ?></div>
    <?php $form = ActiveForm::begin(); ?>
    <div class="body bg-gray">
        <?= $form->field($model, 'username')->textInput(['placeholder' => $model->getAttributeLabel('username')])->label(false) ?>
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => $model->getAttributeLabel('password')])->label(false) ?>
    </div>
    <div class="footer">
        <?= Html::submitButton('Отправить', ['class' => 'btn bg-olive btn-block']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>