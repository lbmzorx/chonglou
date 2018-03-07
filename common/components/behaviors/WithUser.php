<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/5
 * Time: 1:17
 */

namespace common\components\behavior;


use common\models\data\User;
use yii\base\Behavior;

class WithUser extends Behavior
{
    public function getUser(){
        return $this->owner->hasOne(User::className(),['id'=>'user_id'])->select('id,name,head')->asArray();
    }
}