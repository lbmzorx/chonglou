<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/5
 * Time: 1:17
 */
namespace common\components\behaviors;


use yii\base\Behavior;

class StatusCode extends Behavior
{
    public static $cssCode=[0=>'warning',1=>'success',2=>'danger',3=>'info',4=>'primary'];

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

    public function getStatusCss($attribute,$statuCode,$default=0){
        $class=get_class($this->owner);
        $value=$this->owner->{$attribute};

        if(empty($class::${$statuCode}[$value])){
            if(isset(static::$cssCode[$statuCode])){
                return static::$cssCode[$statuCode];
            }else{
                return isset($this->cssCode[$default])?$this->cssCode[$default]:$default;
            }
        }
        return $class::${$statuCode}[$value];
    }

}