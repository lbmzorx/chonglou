<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/25
 * Time: 15:51
 */

namespace common\components\tools;


class ModelHelper
{
    public static function getErrorAsString($errors){
        $err = '';
        foreach ($errors as $k=>$v) {
            $err .=$k.':'.$v[0] . '<br>';
        }
        return $err;
    }
}