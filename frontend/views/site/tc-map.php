<?
use common\models\Level;
use yii\helpers\Url;
use common\models\Image;
use common\models\GoodsCategory;

$curLevelImage = $curLevel->image;
$curLevelImage = $curLevelImage ? $curLevelImage : new Image();
?>
<div class="full-width map-tc-container">

    <div class="full-width text-center or-title-name">
        Карта торгового центра
    </div>

    <div class="module-choose-floor">
        <?
        $levels = Level::find()->orderBy('id')->all();
        ?>
        <?foreach($levels as $k=>$level):?>
            <a href="<?=Url::to(['/site/tc-map', 'levelId'=>$level->id])?>" class="text-center mcf-item <?=$curLevel->id == $level->id ? 'mcf-active' : ''?>">
                <div class="full-width">
                    <div class="mcf-item-icon">
                        <img src="/images/i_map-tc/floor-icon-default.png" alt="" class="floor-icon-default transit-300">
                        <img src="/images/i_map-tc/floor-icon-<?=$k?>.png" alt="" class="floor-icon-visible transit-300">
                    </div>
                </div>
                <div class="full-width mcf-item-name transit-300">
                    <?=$level->name?> ЭТАЖ
                </div>
            </a>
        <?endforeach?>

    </div>

    <div class="full-width text-center module-map-floor">
        <div class="map-container">
            <div class="full-width map-colors-boxes z1">
                <?foreach ($spaces as $k=>$space):
                    $index = $k+1;
                    $tenant = $space->tenant;
                    $goodsCategory = $tenant && $tenant->goodsCategory ? $tenant->goodsCategory : new GoodsCategory();
                    ?>
                    <div class="map-<?=$curLevel->name?>-color-box-<?=$index?> map-box z1" style="<?= $goodsCategory->color ? "background: " . $goodsCategory->color : "" ?>;">
                        <span class="box-name map-<?=$curLevel->name?>-name-pos-<?=$index?> transit-300"><?=$space->name?></span>
                    </div>
                <?endforeach?>
            </div>

            <img src="<?=$curLevelImage->getSrc()?>"  alt="" class="imap-floor z2" usemap="#MapCoordinateBoxes">

            <div class="full-width map-tooltips-boxes z3">
                <div class="map-tooltip transit-300">
                    <div class="full-width tooltip-container">
                        <div class="tooltip-content">

                        </div>
                        <div class="tt-bottom-arrow">
                            <img src="/images/i_map-tc/tooltip-arrow.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <map name="MapCoordinateBoxes" id="mapCoordinateCur">

                <?foreach ($spaces as $k=>$space):
                    $index = $k+1;
                    ?>
                    <area shape="poly" data-block="map-<?=$curLevel->name?>-color-box-<?=$index?>" data-space="<?=$space->id?>"
                          coords="<?=$space->getCoords()?>">
                <?endforeach?>
            </map>

        </div>

    </div>

    <div class="full-width module-map-description">
        <?foreach($cats as $catId=>$cat):
            $category = GoodsCategory::findOne($catId);
            ?>
            <div class="map-item-container">
                <div class="full-width text-center mid-title" style="background: <?=$category->color?>;">
                    <?=$category->name?>
                </div>
                <?foreach($cat as $catAttr):?>
                    <div class="mid-description">
                        <div class="mid-num">
                            <span style="background: <?=$category->color?>;"><?=$catAttr['spaceName']?></span>
                        </div>
                        <div class="mid-name">
                            <?=$catAttr['tenantName']?>
                        </div>
                    </div>
                <?endforeach?>
            </div>
        <?endforeach?>
        <div class="map-item-container">
            <div class="mid-description">
                <div class="mid-num">
                    <img src="/images/i_map-tc/icon-escalator.png" alt="">
                </div>
                <div class="mid-name">
                    Эскалатор
                </div>
            </div>
            <div class="mid-description">
                <div class="mid-num">
                    <img src="/images/i_map-tc/icon-lift.png" alt="">
                </div>
                <div class="mid-name">
                    Лифт
                </div>
            </div>
            <div class="mid-description">
                <div class="mid-num">
                    <img src="/images/i_map-tc/icon-wc.png" alt="">
                </div>
                <div class="mid-name">
                    Туалет
                </div>
            </div>
        </div>

    </div>
</div>