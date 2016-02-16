<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'assetManager' => [
            'linkAssets' => true,
        ],
        'authManager' => [
            'defaultRoles' => [
                'user'
            ],
            /*'class' => 'yii\rbac\DbManager',
            'itemTable' => '{{%auth_item}}',
            'itemChildTable' => '{{%auth_item_child}}',
            'assignmentTable' => '{{%auth_assignment}}',
            'ruleTable' => '{{%auth_rule}}',*/

            'class' => 'yii\rbac\PhpManager',
            'itemFile' => '@common/rbac/items.php',
            'assignmentFile' => '@common/rbac/assignments.php',
            'ruleFile' => '@common/rbac/rules.php',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'mail.ukmost.com',
                'username' => 'm10@ukmost.com',
                'password' => 'Fsg35eg235',
                'port' => '25',
                'encryption' => 'tls',
//                'host' => 'smtp.gmail.com',
//                'username' => '',
//                'password' => '',
//                'port' => '587',
//                'encryption' => 'tls',
            ],
        ],
        'formatter' => [
            'dateFormat' => 'dd.MM.y',
            'datetimeFormat' => 'dd.MM.y HH:mm:ss'
        ],
    ],
];
