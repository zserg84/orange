<?
use common\models\Image;
use yii\helpers\Url;
?>

<div class="full-width tenants-container">

    <div class="full-width or-title">
        <div class="full-width or-title-name">Характеристики объекта</div>
        <div class="or-title-underline"></div>
    </div>

    <div class="full-width tenants-content">
        <?=$orange->text?>
    </div>

    <div class="full-width">

        <div class="col-xs-12 col-sm-6 no-pad">

            <div class="full-width or-title ot-top">
                <div class="full-width or-title-name">Вакантные площади</div>
                <div class="or-title-underline"></div>
            </div>
            <?foreach($freeSpaces as $freeSpace):?>
                <p>
                    <a href="<?=Url::to(['/tenant/view', 'id'=>$freeSpace->tenant_id])?>" class=""><?=$freeSpace->name?> <?=$freeSpace->area ? $freeSpace->area.' кв.м' : ""?></a>
                </p>
            <?endforeach?>
        </div>

        <div class="col-xs-12 col-sm-6 no-pad">

            <div class="full-width or-title ot-top">
                <div class="full-width or-title-name">Рекламные возможности</div>
                <div class="or-title-underline"></div>
            </div>
            <?foreach($advertisings as $advertising):
                $advImage = $advertising->image;
                $advImage = $advImage ? $advImage : new Image;
                ?>
                <p>
                    <a class="ts-advertising transit-300" data-image="<?=$advImage->getSrc()?>"><?=$advertising->name?></a>
                </p>
            <?endforeach?>

        </div>

        <div class="clearfix"></div>

    </div>

</div>