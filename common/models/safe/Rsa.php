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
    public $sessionRsaKey='rsa_key';
    /**
     * @var \common\component\tools\Rsaenctype $_rsa
     */
    private $_rsa;


    /**
     * 获取rsa
     * @return \common\component\tools\Rsaenctype|object
     */
    public function getRsa(){
        if($this->_rsa==null){
            $this->_rsa=\Yii::createObject($this->rsaClass,$this->rsaConfig);
        }
        return $this->_rsa;
    }

    /**
     * 保存rsa 到session
     */
    public function keepSessionRsa(){
        $session=\yii::$app->getSession();
        $sessionRsa=$this->getSessionRsa();
        $rsa=$this->getRsa();
        if($sessionRsa == false){
           if($rsa->privKey ==null || $rsa->pubKey ==null ){
               $rsa->create_key();
           }
            $session->set($this->sessionRsaKey,['public_key'=>$rsa->pubKey,'private_key'=>$rsa->privKey]);
        }
    }

    /**
     * 从session中获取rsa
     * @return bool|mixed
     */
    public function getSessionRsa(){
        $session=\yii::$app->getSession();
        $sessionRsa=$session->get($this->sessionRsaKey);
        $rsa=$this->getRsa();

        if($sessionRsa && isset($sessionRsa['public_key']) &&  isset($sessionRsa['private_key'])){
            $rsa->privKey=$rsa['private_key'];
            $rsa->pubKey=$rsa['public_key'];
            return $sessionRsa;
        }else{
            return false;
        }
    }

    /**
     * 删除session中的rsa
     * @return mixed
     */
    public function removeSessionRsa(){
        $session=\yii::$app->getSession();
        return $session->remove($this->sessionRsaKey);
    }

    /**
     * 获取公钥
     * @return mixed
     */
    public function getPubKey(){
        if($sessionRsa=$this->getSessionRsa() == false){
            $rsa=$this->getRsa();
            if($rsa->pubKey ==null ){
                $rsa->create_key();
                return $rsa->pubKey;
            }
        }else{
            return $sessionRsa['public_key'];
        }
    }

    /**
     * valid attribute and decrypt 对模型的属性进行解密
     *
     * @param \yii\base\Model $model
     * @param $attribut
     * @return mixed
     */
    public function decryptModelAttr($model,$attribut){
        if($rsaKey=\yii::$app->session->get($this->paramsKey)){
            $this->_rsa=$this->getRsa();
            $this->_rsa->privKey=$rsaKey['private_key'];
            $this->_rsa->pubKey=$rsaKey['public_key'];

           if(is_array($attribut)){
                foreach ($attribut as $attr){
                    if(isset($model->$attr)){
                        $model->$attr=$this->_rsa->private_decrypt($model->$attr);
                    }
                }
            }else if(isset($model->$attribut)){
                $model->$attribut=$this->_rsa->private_decrypt($model->$attribut);
            }
        }
        return $model;
    }

}