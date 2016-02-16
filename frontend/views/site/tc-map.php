<?
use common\models\Level;
use yii\helpers\Url;
use common\models\Image;

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

        <div class="map-container" style="display: inline-block; vertical-align: top; width: 950px; position: relative;">

            <img src="<?=$curLevelImage->getSrc()?>" alt="" class="imap-floor">

            <div style="display: block; width: 50px; height: 50px; background: #0000ff; color: #ffffff; position: absolute; right: 0; top: 0; z-index: 1;">
                <?=$curLevel->name?>
            </div>

        </div>

    </div>

    <div class="full-width module-map-description">

        модуль описания

    </div>

</div>