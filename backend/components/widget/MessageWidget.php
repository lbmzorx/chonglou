<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/7
 * Time: 21:20
 */

namespace backend\components\widget;


use common\models\data\AdminMessage;
use yii\base\Widget;
use yii\helpers\Html;

class MessageWidget extends Widget
{

    public $count;

    public $aOption=[];
    public $liOption=[];

    public function run()
    {
        echo $this->renderMessage();
    }

    public static $messageLeve_code=[0=>'success',1=>'success',2=>'info',3=>'warning',4=>'danger'];

    public function renderMessage(){
        $res=AdminMessage::getAdminMessage(\yii::$app->user->id);
        $count=$res['count'];
        if( $count >0 && !empty($res['data'])){
            $messages=$res['data'];
            $li='';
            foreach ($messages as $message){
                $li.=$this->renderLi($message['name'],$message['level'],['/admin/message/view','id'=>$message['id']],$this->aOption,$this->liOption);
            }
            $li.=$this->renderLi(\yii::t('app','More Messages'),'',['/admin/message/index',],$this->aOption,$this->liOption);
            return $this->renderCount($count)."<ul class=\"dropdown-menu notifications\">".$li."</ul>";
        }else{
            return $this->renderCount(0);
        }
    }

    public function renderCount($count,$option=[]){
        $option=array_merge($option,[
            'class'=>"dropdown-toggle",'data-toggle'=>"dropdown", 'aria-expanded'=>false,
        ]);

        return Html::a(Html::tag('i','',['class'=>'lnr lnr-alarm']).Html::tag('span',$count,['class'=>'badge bg-danger']),'#',$option);
    }

    public function renderLi($message,$level,$url,$aOption,$liOption){
        $msg_css=isset(static::$messageLeve_code[$level])?static::$messageLeve_code[$level]:'danger';
        $msg_level_icon="<span class=\"dot bg-{$msg_css}\"></span>";

        if(empty($aOption['class'])){
            $aOption['class']='notification-item';
        }
        return Html::tag('li',Html::a($msg_level_icon.$message,$url,$aOption),$liOption);
    }
}