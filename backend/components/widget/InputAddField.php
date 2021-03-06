<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/7
 * Time: 21:20
 */

namespace backend\components\widget;


use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveField;

class InputAddField extends ActiveField
{
    public $firstOption = [];
    public $firstContent='';

    public $endOption=[];
    public $endContent='';

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        $this->endOption=ArrayHelper::merge($this->endOption,[
            'class'=>'input-group-btn',
        ]);
        $this->firstOption=ArrayHelper::merge($this->firstOption,[
            'class'=>'input-group-addon',
        ]);
    }

    public function textInput($options = [])
    {
        parent::textInput($options); // TODO: Change the autogenerated stub

        $first='';
        if($this->firstContent){
            $first=Html::tag('span',$this->firstContent,$this->firstOption);
        }
        $end='';
        if($this->endContent){
            $end=Html::tag('span',$this->endContent,$this->endOption);
        }


        $this->parts['{input}']='<div class="input-group">'.$first.$this->parts['{input}'].$end.'</div>';
        return $this;
    }
}