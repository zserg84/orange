<?
use common\models\GoodsCategory;
use common\models\Image;
use yii\helpers\Url;

$goodsCategory = $tenant->goodsCategory ? : new GoodsCategory();
$logo = $tenant->logoImage ? : new Image;
?>
<div class="full-width">
    <div class="tt-left-cont">
        <div class="tt-arendator-num" style="background: <?=$goodsCategory->color?>;">
            <?=$space->name?>
        </div>
    </div>
    <div class="tt-right-cont">
        <div class="full-width">
            <img src="<?=$logo->getSrc()?>" alt="" class="tt-logo-arend">
        </div>
        <div class="full-width tt-description">
            <div class="full-width tt-cont">
                <?=$tenant->name?>
            </div>
            <div class="full-width tt-cont">
                <?=$tenant->work_time?>
            </div>
            <div class="full-width tt-cont">
                <a href="<?=$tenant->site?>" target="_blank" class="tooltip-link transit-300"><?=$tenant->site?></a>
            </div>
            <div class="full-width tt-cont">
                <?=$tenant->phone?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="full-width text-center tt-footer">
    <a href="<?=Url::to(['/tenant/view', 'id'=>$tenant->id])?>" class="tooltip-button transit-300" target="_blank">
        Подробнее о магазине
    </a>
</div>