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
     public function getStatusCode($attribute,$statuCode){
         $class=get_class($this->owner);
         $value=$this->owner->{$attribute};
         return empty($class::${$statuCode}[$value])?'':($class::${$statuCode}[$value]);
    }
}