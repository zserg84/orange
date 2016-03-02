<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\assets\AppAssetConfiguration;
use common\models\Tenant;
use yii\helpers\Url;
use common\models\Image;

AppAsset::register($this);
AppAssetConfiguration::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <?$title = $this->title ? $this->title : 'ORANGE';?>
    <title><?= Html::encode($title) ?></title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href='https://fonts.googleapis.com/css?family=PT+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="<?=Yii::getAlias('@web').'/style/css/m_media-screen.css'; ?>">
    <![endif]-->

    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="<?=Yii::getAlias('@web').'/style/css/m_ie8.css'; ?>">
    <![endif]-->

    <?php $this->head() ?>
	
	
</head>
<body>
<?php $this->beginBody() ?>

<div class="loader-img">
    <img src="/images/i-loader.png" alt="">
</div>


<section>

    <div class="background-inner-content"></div>
    <div class="wt-mobile-menu transit-1000"></div>
    <div class="wt-mobile-content transit-1000">
        <?
        $menu = [
            [
                'name' => 'Новости | Акции',
                'name2' => 'Новости<br>Акции',
                'url' => '/stock/index',
                'iconClass' => 'menu-icon-1',
                'active' => Yii::$app->controller->getUniqueId() == 'stock'
            ],
            [
                'name' => 'Карта торгового центра',
                'name2' => 'Карта<br>ТЦ Orange',
                'url' => '/site/tc-map',
                'iconClass' => 'menu-icon-2',
                'active' => Yii::$app->controller->getUniqueId() == 'site' && Yii::$app->controller->action->id == 'tc-map'
            ],
            [
                'name' => 'Зона творчества',
                'name2' => 'Зона<br>творчества',
                'url' => '/tenant/creativity-zone',
                'iconClass' => 'menu-icon-3',
                'active' => Yii::$app->controller->getUniqueId() == 'tenant' && Yii::$app->controller->action->id == 'creative-zone'
            ],
            [
                'name' => 'Для арендаторов',
                'name2' => 'Для<br>арендаторов',
                'url' => '/site/tenants',
                'iconClass' => 'menu-icon-4',
                'active' => Yii::$app->controller->getUniqueId() == 'site' && Yii::$app->controller->action->id == 'tenants'
            ],
            [
                'name' => 'Управляющая компания',
                'name2' => 'Управляющая<br>компания',
                'url' => '/site/uk',
                'iconClass' => 'menu-icon-5',
                'active' => Yii::$app->controller->getUniqueId() == 'site' && Yii::$app->controller->action->id == 'uk'
            ],
        ];

        foreach($menu as $m):
        ?>
            <a href="<?=$m['url']?>" class="wt-link-menu <?=$m['active'] ? 'wt-menu-active' : ''?> transit-300">
                <div class="wt-menu-name">
                    <?=$m['name']?>
                </div>
                <div class="wt-link-separator">
                    <div class="separator-line"></div>
                </div>
            </a>
        <?endforeach?>
        <div class="wt-info-block text-center">
            <a href="tel:89294304201" class="full-width wt-info-phone">
                +7 (929) 430-42-01
            </a>
            <div class="full-width wt-arial-white">
                Ежедневно с 10.00 до 20.00
            </div>
            <div class="full-width wt-arial-white">
                г. Иркутск Волжская, 15
            </div>
            <div class="full-width col-xs-12 wt-soc">
                <div class="row">
                    <div class="col-xs-6">
                        <a href="http://facebook.com" class="social-ic s-facebook transit-300" target="_blank">
                            <img src="/images/icons-social/facebook.png" alt="">
                        </a>
                    </div>
                    <div class="col-xs-6">
                        <a href="http://vk.com" class="social-ic s-vk transit-300" target="_blank" style="margin-right: 40px;">
                            <img src="/images/icons-social/vk.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="full-width start-welcome"></div>

    <?
    $dopClass = '';
    if(!(isset($this->params['startPage']) && $this->params['startPage'] == true))
        $dopClass = 'internal-page';
    ?>
    <div class="or-wrapper <?=$dopClass?>">
        <!-- top bar -->
        <div class="fake-top-bar"></div>
        <div class="top-bar" style="/*border: 1px solid #ffff00;*/">
            <div class="pull-left logo-block">
                <a href="/site/index" class="logo-orange text-center">
                    <img src="/images/logo.png" alt="" class="g1">
                    <img src="/images/logo-white.png" alt="" class="g2">
                    <div class="logo-curtain"></div>
                </a>
            </div>
            <div class="pull-right">
                <div class="location-block">
                    <div class="full-width text-center lb-cont">
                        <div class="full-width loc-phone">
                            +7 (929) 430-42-01
                        </div>
                        <div class="full-width loc-time">
                            Ежедневно с 10.00 до 20.00
                        </div>
                        <div class="full-width loc-address">
                            г. Иркутск Волжская, 15
                        </div>
                    </div>
                    <a href="http://facebook.com" class="social-ic s-facebook transit-300" target="_blank">
                        <img src="/images/icons-social/facebook.png" alt="">
                        <div class="social-curtain"></div>
                    </a>
                    <a href="http://vk.com" class="social-ic s-vk transit-300" target="_blank">
                        <img src="/images/icons-social/vk.png" alt="">
                        <div class="social-curtain"></div>
                    </a>
                </div>
            </div>
        </div>
        <!--/top bar/-->

        <!-- section -->
        <div class="or-section" style="/*border: 1px solid #ffff00;*/">
            <div class="or-great-block">
                <div class="content-container text-left">
                    <div class="cc-row">
                        <div class="cc-cell head-content">
                            <div class="head-carousel text-center">
                                <ul class="slides">
                                    <?
                                    $tenants = Tenant::find()->all();
                                    foreach($tenants as $tenant):
                                        $tenantImage = $tenant->logoImage;
                                        if($tenantImage):?>
                                        <li>
                                            <a href="<?=Url::to(['/tenant/view', 'id'=>$tenant->id])?>" class="hc-link">
                                                <div class="hc-link-cell">
                                                    <img src="<?=$tenantImage->getSrc()?>" alt="">
                                                </div>
                                            </a>
                                        </li>
                                        <?endif?>
                                    <?endforeach?>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="cc-row">
                        <div class="cc-cell section-content">
                            <?=$content?>
                        </div>
                    </div>
                    <div class="cc-row">
                        <div class="cc-cell footer-content">

                        </div>
                    </div>
                </div>

            </div>


            <div class="or-menu">
                <nav>
                    <?foreach($menu as $m):
                        ?>
                        <div class="full-width or-menu-item om-item-1 <?=$m['active'] ? 'active-item' : ''?>">
                            <a href="<?=$m['url']?>" class="full-width text-center or-menu-link <?=$m['active'] ? 'active-page' : ''?>"><!-- класс "active-page" для внутренних страниц -->
                                <div class="menu-curtain"></div>
                                <div class="full-width or-menu-icon <?=$m['iconClass']?>"></div>
                                <div class="full-width or-menu-name n1">
                                    <?=$m['name']?>
                                </div>
                                <div class="full-width or-menu-name n2">
                                    <?=$m['name2']?>
                                </div>
                            </a>
                        </div>
                    <?endforeach?>
                </nav>
            </div>
        </div>
        <!--/section/-->

        <div class="pop-leave-demand transit-800">
            <div class="pld-container">
                <div class="pld-cell">
                    <div class="pop-container transit-800">
                        <div class="pop-close">
                            <img src="/images/i_popup/pop-close.png" alt="" class="pop-close-default transit-300">
                            <img src="/images/i_popup/pop-close-hover.png" alt="" class="pop-close-active transit-300">
                        </div>
                        <div class="full-width pop-description">
                            <img src="/images/i_tenants/photo-1.jpg" alt="" class="full-width">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <div class="or-footer" style="/*border: 1px solid #ffff00;*/">
            <div class="footer-container">
                <div class="fc-cell">
                    <div class="pull-left">
                        &copy; 2015 ТОЦ «Orange»
                    </div>
                    <div class="pull-right fc-location">
                        <div class="full-width fl-name">
                            г. Иркутск, Волжская, 15
                        </div>
                        <div class="full-width fl-name">
                            +7 (929) 430-42-01
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--/footer/-->

        <div class="full-width mobile-tooltip transit-1000">
            <div class="mt-container">
                <div class="close-mt-tooltip transit-300">Х</div>
                <div class="mt-content">
                    <div class="mt-content-block">mobile popup</div>
                </div>
            </div>
        </div>
    </div>

</section>

<?if(\Yii::$app->session->getFlash('message')):?>
<div class="send-message-container sm-show transit-1000">
    <div class="sm-block">
        <div class="sm-block-cell">
            <div class="sm-window">
				<div class="close-modal-msg">X</div>
                <div class="sm-window-context">
                    <?=\Yii::$app->session->getFlash('message')?>
                </div>
                <div class="sm-window-btn transit-300">
                    Ok
                </div>
            </div>
        </div>
    </div>
</div>
<?endif?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
