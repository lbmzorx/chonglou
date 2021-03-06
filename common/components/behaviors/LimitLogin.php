<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace common\components\behaviors;

use Yii;
use common\components\events\LoginEvent;
use yii\base\Behavior;
use yii\base\Model;
use yii\caching\TagDependency;
use yii\web\BadRequestHttpException;
use yii\web\HttpException;

/**
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Alexander Kochetov <creocoder@gmail.com>
 * @since 2.0
 */
class LimitLogin extends Behavior
{
    const TAG_LOGIN_FATAL='LOGIN_FATAL';
    public $prefix='LE_';
    public function events()
    {
        return [
            LoginEvent::EVENT_BEFORE_LOGIN=>'checkLogin',
            LoginEvent::EVENT_FAILED_LOGIN=>'failedLogin',
        ]; // TODO: Change the autogenerated stub
    }

    public function failedLogin($event){
        $key=[$this->getIpKey(),self::TAG_LOGIN_FATAL];
        if($error=Yii::$app->cache->get($key)){
            $error['count']=isset($error['count'])?($error['count']+1):1;
            if($error['count']>5){
                $lockTime=intval(1+('1E'.($error['count']-6)));
                $error['lock_time']=(time()+30*($error['count']-5)*($error['count']-5)*($error['count']-5)+$lockTime);
            }
        }else{
            $error=['count'=>1];
        }
        Yii::$app->cache->set($key,$error,3600*24,new TagDependency(['tags'=>self::TAG_LOGIN_FATAL]));
    }

    public function checkLogin($event){
        $key=[$this->getIpKey(),self::TAG_LOGIN_FATAL];
        $error=Yii::$app->cache->get($key);
        if(isset($error['lock_time']) && $error['count']<=10){
            if(isset($error['lock_time'])&&$error['lock_time']>time()){
                $msg=yii::t('model','You have failed to try login more than {count}times, please wait {time}s',['time'=>$error['lock_time']-time(),'count'=>$error['count']]);
                \yii::$app->getSession()->setFlash('warning',$msg);
                throw new HttpException(200,$msg);
            }
        }elseif(isset($error['count']) && $error['count']>10){
            $msg=yii::t('model','You have failed to try login more than 10times, please try tomorrow!');
            \yii::$app->getSession()->setFlash('error',$msg);
            throw new BadRequestHttpException($msg);
        }
    }

    public function getIpKey(){
        return $this->prefix.\yii::$app->request->userIP;
    }
}
