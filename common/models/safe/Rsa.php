<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/2
 * Time: 0:20
 */

namespace common\models\safe;


use yii\base\Model;

class Rsa extends Model
{
    public $rsaClass='common\component\tools\Rsaenctype';
    public $rsaConfig=[];
    public $paramsKey='rsa_key';
    /**
     * @var \common\component\tools\Rsaenctype $_rsa
     */
    private $_rsa;


    public function getRsa(){
        if($this->_rsa==null){
            $this->_rsa=\Yii::createObject($this->rsaClass,$this->rsaConfig);
        }
        return $this->_rsa;
    }

    public function keepKeys(){
        $this->_rsa=$this->getRsa();
        \yii::$app->session->set($this->paramsKey,$this->_rsa->create_key());
    }

    public function getPubKey(){
        return $this->getRsa()->pubKey;
    }

    /**
     * valid attribute and decrypt
     * @param \yii\base\Model $model
     * @param $attribut
     * @return mixed
     */
    public function decrypt($model,$attribut){
        if($rsaKey=\yii::$app->session->get($this->paramsKey)){
            $this->_rsa=$this->getRsa();
            $this->_rsa->privKey=$rsaKey['private_key'];
            $this->_rsa->pubKey=$rsaKey['public_key'];

           if(is_array($attribut)){
                foreach ($attribut as $a){
                    if(isset($model->$a)){
                        $model->$a=$this->_rsa->private_decrypt($model->$a);
                    }
                }
            }else if(isset($model->$attribut)){
                $model->$attribut=$this->_rsa->private_decrypt($model->$attribut);
            }
        }
        return $model;
    }

}