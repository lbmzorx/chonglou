<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/13
 * Time: 9:35
 */
return
//    [
//        'class' => 'yii\db\Connection',
//        'dsn' => 'mysql:host=192.168.110.9;dbname=chonglou',
//        'username' => 'chonglou',
//        'password' => '1234569',
//        'charset' => 'utf8',
//        'tablePrefix'=>'chonglou_',
//    ];
[
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=127.0.0.1;dbname=chonglou',
    'username' => 'root',
    'password' => '1234569',
    'charset' => 'utf8',
    'tablePrefix'=>'chonglou_',
    'enableSchemaCache'=>true,
];