<?
use yii\helpers\Url;
?>
<div class="full-width not-arendator">
    <div class="tt-left-cont">
        <div class="tt-arendator-num" style="background: #EEE0E5;">
            <?=$space->name?>
        </div>
    </div>
    <div class="tt-right-cont">
        <div class="full-width tt-description">
            <div class="full-width tt-cont">
                Павильон не занят, у вас есть уникальный шанс арендовать его! Обратитесь к администрации ТЦ ORANGE
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?if($tenant):?>
    <div class="full-width text-center tt-footer">
        <a href="<?=Url::to(['/tenant/view', 'id'=>$tenant->id])?>" class="tooltip-button transit-300" target="_blank">
            Подробнее о площади
        </a>
    </div>
<?endif?>