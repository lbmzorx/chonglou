<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/21
 * Time: 21:54
 */

namespace common\components\events;


use yii\base\Event;

class LoginEvent extends Event
{
    const EVENT_BEFORE_LOGIN    = 'beforeLogin'; //登录前的事件
    const EVENT_AFTRE_LOGIN     = 'afterLogin';  //登录后的事件
    const EVENT_FAILED_LOGIN    = 'failedLogin'; //登录失败事件

    public $user;

}