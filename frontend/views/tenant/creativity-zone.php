<?
use common\models\Image;
use yii\helpers\Url;
?>
<div class="cz-creative-container">
    <?foreach($tenants as $tenant):
        $tenantImage = $tenant->logoImage;
        $tenantImage = $tenantImage ? $tenantImage : new Image();
        ?>
        <div class="col-xs-12 col-sm-6 col-lg-4 text-center cz-creative-item">
            <a href="<?=Url::to(['/tenant/view', 'id'=>$tenant->id])?>" class="cz-item-block">
                <div class="cz-item-cell">
                    <div class="full-width">
                        <img src="<?=$tenantImage->getSrc()?>" alt="">
                    </div>
                    <div class="full-width cz-item-name transit-300">
                        <?=$tenant->name?>
                    </div>
                </div>
            </a>
        </div>
    <?endforeach?>

    <div class="clearfix"></div>

</div>