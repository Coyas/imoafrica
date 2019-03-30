<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=imoDefault',
            'username' => 'coyasimo',
            'password' => 'MalucoImoafrica87??',
            'charset' => 'utf8',
        ],
        'reCaptcha' => [
            'name' => 'reCaptcha',
            'class' => 'himiklab\yii2\recaptcha\ReCaptcha',
            'siteKey' => '6LeAl3QUAAAAAPh0DtPfFmnKgmBwQDpK9XwQFVYc',
            'secret' => '6LeAl3QUAAAAALruOESsemGt-x4vMZx1W8UjTejZ',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
//            'transport' => [
//                'class' => 'Swift_SmtpTransport',
//                'host' => 'imoafrica.com',
//                'username' => 'suporte@imoafrica.com',
//                'password' => 'Terra.system1',
//                'port' => '465',
//                'encryption' => 'ssl',
//            ],
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'imoafrica.com',
                'username' => 'geral@imoafrica.com',
                'password' => 'MalucoImoafrica87??',
                'port' => '465',
                'encryption' => 'ssl',
            ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '-',
            'locale' => 'pt-PT',
            'dateFormat' => 'd-M-Y',
            'datetimeFormat' => 'd-M-Y H:i:s',
            'timeFormat' => 'H:i:s',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'CVE',
            'timeZone' => 'Atlantic/Cape_Verde'
        ],
    ],
];
