<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/5
 * Time: 1:17
 */

namespace common\components\behaviors;

use yii\helpers\ArrayHelper;

class CommitAction extends NumAction
{
    const ACTION_ADD_COMMIT='addCommit';
    const ACTION_DELET_COMMIT='deleteCommit';

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
        $evens= [
            self::ACTION_ADD_COMMIT=>'addCommit',
            self::ACTION_DELET_COMMIT=>'deleteCommit',
        ];
        ArrayHelper::merge(parent::events(),$evens);
    }

    /**
     * 添加评论
     * @param $event
     */
    public function addCommit($event){
        $this->changeNum($event);
    }

    /**
     * 删除评论
     * @param $event
     */
    public function deleteCommit($event){
        $this->changeNum($event);
    }


}