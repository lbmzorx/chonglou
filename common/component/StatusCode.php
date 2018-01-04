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
     public function getStatusCode($attribute){
         return empty(get_class($this->owner)::${$attribute})?:get_class($this->owner)::${$attribute}[$this->owner->{$attribute}];
    }
}