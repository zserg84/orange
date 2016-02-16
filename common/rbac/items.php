<?php
return [
    'BViewCalculationFirStyle' => [
        'type' => 2,
    ],
    'BEditCalculationFirStyle' => [
        'type' => 2,
    ],
    'BViewCalculationDesign' => [
        'type' => 2,
    ],
    'BEditCalculationDesign' => [
        'type' => 2,
    ],
    'BViewCalculationSite' => [
        'type' => 2,
    ],
    'BEditCalculationSite' => [
        'type' => 2,
    ],
    'BViewCalculationCommon' => [
        'type' => 2,
    ],
    'BEditCalculationCommon' => [
        'type' => 2,
    ],

    'accessBackend' => [
        'type' => 2,
        'description' => 'Доступ в админку (не удалять)',
        'data' => 'Доступ в админку',
        'children' => [
            'BViewCalculationFirStyle',
            'BEditCalculationFirStyle',
            'BViewCalculationDesign',
            'BViewCalculationSite',
            'BEditCalculationSite',
            'BViewCalculationCommon',
            'BEditCalculationCommon',
        ],
    ],
    'superadmin' => [
        'type' => 1,
        'description' => 'Super admin',
        'children' => [
            'accessBackend',
        ],
    ],
];
