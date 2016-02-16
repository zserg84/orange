<?
use common\models\Image;

$stockPhoto = $model->photoImage;
$stockPhoto = $stockPhoto ? $stockPhoto : new Image();
?>

<div class="full-width or-title">
    <div class="full-width or-title-name">Новости</div>
    <div class="or-title-underline"></div>
</div>

<div class="full-width">
    <a href="http://facebook.com" class="an-link-social">
        <img src="/images/i_actions-news/fb-like-1.png" alt="">
    </a>
    <a href="http://facebook.com" class="an-link-social">
        <img src="/images/i_actions-news/fb-like-2.png" alt="">
    </a>
</div>

<div class="full-width internal-nd-title">
    <?=$model->name?>
</div>

<div class="full-width an-internal-content">
    <?=$model->description?>
</div>

<div class="full-width text-center an-internal-photo">
    <img src="<?=$stockPhoto->getSrc()?>" alt="">
</div>

<?
if($tenant = $model->tenant):
    $tenantImage = $tenant->logoImage;
    $tenantImage = $tenantImage ? $tenantImage : new Image();
?>
<div class="full-width an-info-shop">
    <div class="an-logo-company">
        <img src="<?=$tenantImage->getSrc()?>" alt="">
    </div>
    <div class="an-company-desk">
        <div class="full-width">
            <?=$tenant->work_time?>
        </div>
        <div class="full-width">
            <a href="<?=$tenant->site?>" class="an-link-site" target="_blank"><?=$tenant->site?></a>
        </div>
        <div class="full-width">
            <?=$tenant->phone?>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<?endif?>