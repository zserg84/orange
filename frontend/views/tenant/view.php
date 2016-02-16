<?
use common\models\Space;
use common\models\Image;

$tenantLogo = $tenant->logoImage;
$tenantLogo = $tenantLogo ? $tenantLogo : new Image();

$tenantPhoto = $tenant->photoImage;
$tenantPhoto = $tenantPhoto ? $tenantPhoto : new Image();

$goodsCategory = $tenant->goodsCategory;
$space = $tenant->space ? $tenant->space : new Space;
?>
<div class="cz-creative-container"> <!-- класс "not-poster-background" убирает постер с фона контента -->
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
            <p>Расписание занятий уточняйте по номеру: <?=$tenant->phone?></p>
        </div>

        <div class="full-width cz-view-title">
            Описание:
        </div>

        <div class="full-width cz-view-dsk">
            <?=$tenant->description?>
        </div>

    </div>
    <div class="full-width cz-view-background-poster">
        <img src="<?=$tenantPhoto->getSrc()?>" alt="">
        <!-- <img src="images/i_head-carousel/test-big-height.jpg" alt=""> -->
    </div>

</div>