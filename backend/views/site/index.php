<?php

/**
 * Backend main page view.
 *
 * @var yii\base\View $this View
 */
use yii\helpers\Html;

$this->title = 'Админка';
$this->params['subtitle'] = 'Главная страница'; ?>
<div class="jumbotron text-center">
    <h1><?php echo Html::encode($this->title); ?></h1>
</div>