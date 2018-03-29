<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@resource', dirname(dirname(__DIR__)) . '/resource');        //资源包
Yii::setAlias('@migration', dirname(dirname(__DIR__)) . '/migrations');     //数据库迁移