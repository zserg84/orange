<?
use common\models\Image;
?>
<div class="full-width man-contact-container">

    <div class="full-width">

        <div class="full-width or-title">
            <div class="full-width or-title-name"><?=$uk->name?></div>
            <div class="or-title-underline"></div>
        </div>

        <div class="full-width mcc-title-1">
            Реквизиты:
        </div>
        <div class="full-width mcc-bik">
            <?=$uk->properties?>
        </div>

    </div>

    <div class="full-width">

        <div class="full-width or-title or-mc-title">
            <div class="full-width or-title-name">Дополнительные услуги компании</div>
            <div class="or-title-underline"></div>
        </div>

        <div class="full-width mcc-bik">
            <?
            $services = $uk->ukServices;
            $services = $services ? $services : [];
            foreach($services as $service):?>
                <p><?=$service->name?></p>
            <?endforeach?>
        </div>

    </div>


    <div class="col-xs-12 no-pad">

        <div class="full-width">

            <div class="full-width or-title or-mc-title">
                <div class="full-width or-title-name">Другие объекты компании</div>
                <div class="or-title-underline"></div>
            </div>

            <div class="full-width">
                <?
                $objects = $uk->ukObjects;
                $objects = $objects ? $objects : [];
                foreach($objects as $object):
                    $objectImage = $object->image;
                    $objectImage= $objectImage ? $objectImage : new Image;
                    ?>
                    <div class="col-xs-4 man-other-object man-full-width">
                        <img src="<?=$objectImage->getSrc()?>" alt="">
                        <div class="man-shading-container transit-300">
                            <div class="man-sc-block">
                                <div class="man-shading-cell">
                                    <?=$object->address?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?endforeach?>
                <div class="clearfix"></div>

            </div>

        </div>

    </div>

    <div class="clearfix"></div>


    <div class="col-xs-12 no-pad man-location-container">

        <div class="full-width or-title">
            <div class="full-width or-title-name">Контакты управляющей компании</div>
            <div class="or-title-underline"></div>
        </div>

        <div class="full-width">
            <div class="full-width man-location-name">Адрес: <?=$uk->address?></div>
            <div class="full-width man-location-name">Телефон: <?=$uk->phone?></div>
            <div class="full-width man-location-name">E-mail: <?=$uk->email?></div>
        </div>

        <div class="full-width man-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2441.843226357333!2d104.31226331605795!3d52.26439186289256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5da83b6310517f75%3A0x23f7aeb810bbc7ee!2z0YPQuy4g0JLQvtC70LbRgdC60LDRjywgMTUsINCY0YDQutGD0YLRgdC6LCDQmNGA0LrRg9GC0YHQutCw0Y8g0L7QsdC7LiwgNjY0MDgx!5e0!3m2!1sru!2sru!4v1454406852317" frameborder="0" allowfullscreen class="frame-map"></iframe>
        </div>

    </div>

    <div class="clearfix"></div>
</div>