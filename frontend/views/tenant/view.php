<?
use common\models\Space;
use common\models\Image;
use common\models\Tenant;
use common\models\Level;
use common\models\GoodsCategory;

$tenantLogo = $tenant->logoImage;
$tenantLogo = $tenantLogo ? $tenantLogo : new Image();

$tenantPhoto = $tenant->photoImage;
$tenantPhoto = $tenantPhoto ? $tenantPhoto : new Image();

$goodsCategory = $tenant->goodsCategory;
$goodsCategory = $goodsCategory ? $goodsCategory : new GoodsCategory;
$spaces = $tenant->spaces;
$space = $spaces ? current($spaces) : new Space;

$level = $space->level ? : new Level();
$levelImage = $level->image ? : new Image;

$stock = null;
if($stocks = $tenant->stocks){
    $stock = current($stocks);
}
?>
<div class="cz-creative-container not-poster-background"> <!-- класс "not-poster-background" убирает постер с фона контента -->
    <div class="full-width">
        <div class="cz-left-view-logo text-center">
            <img src="<?=$tenantLogo->getSrc()?>" alt="">
        </div>
        <div class="cz-logo-description">
            <div class="full-width or-title">
                <div class="full-width or-title-name transit-1000"><?=$tenant->name?></div>
                <div class="or-title-underline"></div>
            </div>

            <div class="full-width cz-dsk-list">

                <div class="full-width cz-dsk-name">
                    <span class="cz-cdn-title">Категория:</span>
                    <span class="cz-cdn-object" style="background: <?=$goodsCategory->color?>"><?=$goodsCategory->name?></span>
                </div>

                <div class="full-width cz-dsk-name">
                    Номер павильона: <?=$space->name?>
                </div>

            </div>

            <!--<div class="full-width">
                <a href="http://facebook.com" class="an-link-social">
                    <img src="/images/i_actions-news/fb-like-1.png" alt="">
                </a>
                <a href="http://facebook.com" class="an-link-social">
                    <img src="/images/i_actions-news/fb-like-2.png" alt="">
                </a>
            </div>-->
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="full-width cz-view-content">

        <div class="full-width cz-view-title">
            Время работы:
        </div>

        <div class="full-width cz-view-dsk">
            <p><?=$tenant->work_time?></p>
            <p><a href="<?=$tenant->site?>" target="_blank" class="an-link-site"><?=$tenant->site?></a></p>
            <p>Телефон: <?=$tenant->phone?></p>
        </div>

        <div class="full-width cz-view-title">
            Описание:
        </div>

        <div class="full-width cz-view-dsk">
            <?=$tenant->description?>
        </div>

        <?if($stock):?>
            <div class="full-width cz-view-title">
                Акции/Новости
            </div>

            <div class="full-width cz-view-dsk">
                <p><?=$stock->description?></p>
            </div>
        <?endif?>
    </div>

    <div class="full-width arendator-card-picture">
        <img src="<?=$tenantPhoto->getSrc()?>" alt="">
    </div>

    <div class="full-width text-center module-map-floor arendator-view-active" style="width: 100%;">
        <div class="map-container">
            <div class="full-width map-colors-boxes z1">
                <?
                $spaces = Space::findAll([
                    'level_id' => $level->id
                ]);
                foreach($spaces as $k=>$levelSpace):
                    $index = $k+1;
                    $ten = $levelSpace->tenant ? : new Tenant();
                    $gc = $ten->goodsCategory ? : new GoodsCategory();
                    $color = $ten->id == $tenant->id ? $gc->color : '#cccccc';
                    ?>
                    <div class="map-<?=$level->name?>-color-box-<?=$index?> map-box z1 hover-box-active" style="background: <?=$color?>;">
                        <span class="box-name map-<?=$level->name?>-name-pos-<?=$index?> transit-300"><?=$levelSpace->name?></span>
                    </div>
                <?endforeach?>
            </div>

            <img src="<?=$levelImage->getSrc()?>" alt="" class="imap-floor z2" usemap="#MapCoordinateBoxes">

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
                <?foreach ($spaces as $k=>$levelSpace):
                    $index = $k+1;
                    ?>
                    <area shape="poly" data-block="map-<?=$level->name?>-color-box-<?=$index?>" data-space="<?=$levelSpace->id?>"
                          coords="<?=$levelSpace->getCoords()?>">
                <?endforeach?>
            </map>
        </div>
    </div>

</div>