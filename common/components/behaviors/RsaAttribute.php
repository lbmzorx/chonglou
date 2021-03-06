<?php
/**
 */

namespace common\components\behaviors;

use common\components\tools\Rsaenctype;
use yii\base\Behavior;
use yii\base\Model;
/**
 *
 */
class RsaAttribute extends Behavior
{
    /**
     * @var string the attribute that will receive timestamp value
     * Set this property to false if you do not want to record the creation time.
     */
    public $rsaAtAttributes = 'password';

    public function events()
    {
        return [
            Model::EVENT_BEFORE_VALIDATE=>'tranValue',
        ]; // TODO: Change the autogenerated stub
    }

    /**
     * 转换属性值
     */
    public function tranValue($event){
        $owner = $event->sender;
        if(is_array($this->rsaAtAttributes)){
            foreach ($this->rsaAtAttributes as $attribute){
                if($owner->$attribute){
                    if(isset($rsa) && is_object($rsa)){
                        $owner->$attribute=$rsa->private_decrypt($owner->$attribute);
                    }else{
                        $res=Rsaenctype::sessionDecryptPrivate($owner->$attribute,true);
                        $owner->$attribute=$res['res'];
                        $rsa=$res['rsa'];
                    }
                }
            }
        }else{
            $owner->{$this->rsaAtAttributes}=Rsaenctype::sessionDecryptPrivate($owner->{$this->rsaAtAttributes});
        }
    }

}
