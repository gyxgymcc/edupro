<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'name' => '教育平台',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    'language' => 'zh-CN',
    
    'timeZone' => 'Asia/ShangHai',
];
