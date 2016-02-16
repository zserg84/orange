<div>
    <strong>От: </strong>
    <span><?=$letter->fio?></span>
</div>
<div>
    <strong>E-mail: </strong>
    <span><?=$letter->email?></span>
</div>
<div>
    <strong>Телефон: </strong>
    <span><?=$letter->phone?></span>
</div>
<?if($letter->statementInterest):?>
<div>
    <strong>Что интересует: </strong>
    <span><?=$letter->statementInterest->name?></span>
</div>
<?endif;?>
<div>
    <strong>Сообщение: </strong>
    <span><?=$letter->text?></span>
</div>