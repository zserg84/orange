<div style="font-size: 12px">

<?php

/**
 * Sidebar menu layout.
 *
 * @var \yii\web\View $this View
 */

use kartik\sidenav\SideNav;
use common\models\Uk;

$uk = Uk::find()->one();
$ukItems = [
    [
        'label' => 'Реквизиты',
        'url' => ['/uk/update'],
    ],
];
if($uk){
    $ukItems[] = [
        'label' => 'Дополнительные услуги компании',
        'url' => ['/uk-services/index'],
    ];
    $ukItems[] = [
        'label' => 'Объекты компании',
        'url' => ['/uk-objects/index'],
    ];
}

echo SideNav::widget([
    'type' => SideNav::TYPE_DEFAULT,
    'encodeLabels' => false,
    'activateParents' => true,
    'items' => [
        [
            'label' => 'Главная',
            'url' => Yii::$app->homeUrl,
            'icon' => 'fa-dashboard',
            'active' => Yii::$app->request->url === Yii::$app->homeUrl
        ],
        [
            'label' => 'Главная галерея',
            'url' => ['/main-gallery/update'],
        ],
        [
            'label' => 'Акции',
            'url' => ['/stock/index'],
        ],
        [
            'label' => 'Этажи',
            'url' => ['/level/index'],
        ],
        [
            'label' => 'Площади',
            'url' => ['/space/index'],
        ],
        [
            'label' => 'Арендаторы',
            'url' => ['/tenant/index'],
        ],
        [
            'label' => 'Для арендаторов',
            'items' => [
                [
                    'label' => 'Характеристи объекта',
                    'url' => ['/orange-property/update'],
                ],
                [
                    'label' => 'Рекламные возможности',
                    'url' => ['/advertising/index'],
                ],
            ],
        ],
        [
            'label' => 'Управлющая компания',
            'items' => $ukItems
        ],
    ],
]);

?>

</div>