<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache'     => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'dateFormat'        => 'php:m.d.Y',
            'timeFormat'        => 'php:H:i:s',
            'datetimeFormat'        => 'php:m.d.Y H:i:s',
            'decimalSeparator'  => ',',
            'thousandSeparator' => ' ',
            'timeZone'          => 'Europe/Kiev'
        ],
    ],
];
