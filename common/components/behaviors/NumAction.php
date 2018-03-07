<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/5
 * Time: 1:17
 */

namespace common\components\behaviors;

use yii\base\Behavior;

class NumAction extends Behavior
{
    const ACTION_NUM_CHANGE='changeNum';

    public $ownerAttribute;     //对应宿主属性
    public $actionId;           //所更新模型id
    public $actionType='article';
    public $actionAttributes;   //所需的模型列
    public $actionClass;        //更新的模型
    public $actionKey;          // 对应更新的属性
    public $addWhere=[];        //附加条件

    public $isRedis =   true;   //使用redis缓存队列更新
    public $keyRedis;           //redis的hash键

    public $incre=1;            //增长量
    public $min=0;              //最小值
    public $max=0;              //最大值

    public function events()
    {
        return [
            self::ACTION_NUM_CHANGE=>'changeNum',
        ];
    }

    public function changeNum($event){
        if($this->actionClass && class_exists($this->actionClass) && $this->getActionId()){
            $keyRedis=$this->getKeyRedis();
            if($this->isRedis && $keyRedis){
                $this->saveRedis($keyRedis);
            }else{
                $this->saveDb();
            }
        }
    }

    /**
     * 获取存储对象的id
     * @return mixed
     */
    public function getActionId(){
        if($this->actionId==null){
            $this->actionId=$this->owner->{$this->ownerAttribute};
        }
        return $this->actionId;
    }

    /**
     * 获取redis的键
     * @return string
     */
    public function getKeyRedis(){
        $actionId=$this->getActionId();
        if($this->keyRedis==null){
            $this->keyRedis=$this->actionType.$actionId;
        }
        return $this->keyRedis;
    }

    /**
     * 加入到redis队列中，不保存到数据库
     * @param $keyRedis
     */
    protected function saveRedis($keyRedis){
        $redis=\yii::$app->redis;
        if(!$redis->exists($keyRedis)){
            $content=($this->actionClass)::find()->select($this->actionAttributes)
                ->where(['id'=>$this->actionId])->andFilterWhere($this->addWhere)
                ->asArray()->one();

            $content['tableName']=($this->actionClass)::tableName();
            $redis->hmset($keyRedis,$content);
        }

        if($this->incre>0 && $this->max==0){
            $redis->hincrby($keyRedis,$this->actionKey,$this->incre);       //已经加入了任务处理，需要别的队列进程去处理,保存到数据库
        }elseif($this->incre>0 && $this->max>0 && ($redis->hget($keyRedis,$this->actionKey)+$this->incre)<=$this->max){
            $redis->hincrby($keyRedis,$this->actionKey,$this->incre);       //已经加入了任务处理，需要别的队列进程去处理,保存到数据库
        }
        elseif($this->incre<0 && ($redis->hget($keyRedis,$this->actionKey)+$this->incre)>=$this->min){
            $redis->hincrby($keyRedis,$this->actionKey,$this->incre);       //已经加入了任务处理，需要别的队列进程去处理,保存到数据库
        }
    }

    /**
     * 保存数据到数据库
     */
    protected function saveDb(){
        $transaction=($this->actionClass)::getDb()->beginTransaction();
        $action=($this->actionClass)::find()->where(['id'=>$this->actionId])->andFilterWhere($this->addWhere)->one();
        if($action){
            $num=$action->{$this->actionKey};
            if($this->incre>0 && $this->max==0){
                $action->{$this->actionKey}=$num+$this->incre;
            }elseif($this->incre>0 && $this->max>0 && ($num+$this->incre)<=$this->max){
                $action->{$this->actionKey}=$action->{$this->actionKey}+$this->incre;
            }
            elseif($this->incre<0 && ($num+$this->incre)>=$this->min){
                $action->{$this->actionKey}=$num+$this->incre;
            }
            if($action->save()){
                $transaction->commit();
            }else{
                $transaction->rollBack();
            }
        }
    }

}