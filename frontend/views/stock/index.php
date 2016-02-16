<?
use common\models\Image;
use yii\helpers\Url;
?>
<div class="an-container no-actions-content"> <!-- класс "no-actions-content" прячет правый блок с акциями если акций нет для магазинов -->
    <div class="anc-row-left">

        <div class="an-news-content">

            <div class="full-width or-title">
                <div class="full-width or-title-name transit-1000">Новости | Акции</div>
                <div class="or-title-underline"></div>
            </div>

            <div class="full-width ann-content">
                <?foreach($stocks as $stock):
                    $stockMinImage = $stock->minPhotoImage;
                    $stockMinImage = $stockMinImage ? $stockMinImage : new Image();
                    ?>
                    <div class="an-item">
                        <div class="news-photo">
                            <img src="<?=$stockMinImage->getSrc()?>" alt="<?=$stock->name?>" title="<?=$stock->name?>">
                        </div>
                        <div class="news-description">
                            <div class="full-width nd-title">
                                <?=$stock->name?>
                            </div>
                            <div class="full-width nd-content">
                                <?=$stock->description?>
                            </div>
                            <div class="full-width nd-more">
                                <a href="<?=Url::to(['view', 'id'=>$stock->id])?>" class="nd-more-link transit-300">
                                    Подробнее &gt;
                                </a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <?endforeach?>
            </div>
        </div>
    </div>
    <div class="anc-row-right">

        <div class="an-actions-content">

            <div class="full-width or-title">
                <div class="full-width or-title-name transit-1000">Акции магазинов</div>
                <div class="or-title-underline"></div>
            </div>

            <?foreach($stocks as $stock):
                $stockMinImage = $stock->minPhotoImage;
                $stockMinImage = $stockMinImage ? $stockMinImage : new Image();
                ?>
                <div class="an-item">
                    <div class="full-width actions-title">
                        <?=$stock->name?>
                    </div>
                    <div class="full-width actions-photo">
                        <img src="<?=$stockMinImage->getSrc()?>" alt="<?=$stock->name?>" title="<?=$stock->name?>">
                    </div>
                    <div class="full-width nd-more">
                        <a href="<?=Url::to(['view', 'id'=>$stock->id])?>" class="nd-more-link transit-300">
                            Подробнее &gt;
                        </a>
                    </div>
                </div>
            <?endforeach?>
        </div>
    </div>
    <div class="clearfix"></div>
</div>