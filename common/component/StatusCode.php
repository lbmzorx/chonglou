<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/5
 * Time: 1:17
 */

namespace common\component;


use yii\base\Behavior;

class StatusCode extends Behavior
{
    /**
     * 获取状态码
     * @param $attribute
     * @param $statuCode
     * @param string $default
     * @return string
     */
     public function getStatusCode($attribute,$statuCode,$default=''){
         $class=get_class($this->owner);
         $value=$this->owner->{$attribute};
         return empty($class::${$statuCode}[$value])?$default:($class::${$statuCode}[$value]);
    }
}