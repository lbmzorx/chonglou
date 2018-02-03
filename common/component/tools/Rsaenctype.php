<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/2
 * Time: 0:09
 */

namespace common\component\tools;

use yii\base\Object;

class Rsaenctype extends Object
{
    /**
     * 配置
     * @var array
     */
    public $config=array(
        "config" => 'D:\phpStudy\Apache\conf/openssl.cnf',
        "private_key_bits" => 512,                     //字节数    512 1024  2048   4096 等
        "private_key_type" => OPENSSL_KEYTYPE_RSA,     //加密类型
    );

    public $privKey;
    public $pubKey;

    /**
     * 生成一对公私密钥 成功返回 公私密钥数组 失败 返回 false
     */
    public function create_key() {
        $res = openssl_pkey_new($this->config);
        if($res == false) return false;
        openssl_pkey_export($res, $privKey, null, $this->config);
        $public_key = openssl_pkey_get_details($res);

        $this->privKey=$privKey;
        $this->pubKey=$public_key["key"];
        openssl_free_key($res);
        return array('public_key'=>$public_key["key"],'private_key'=>$privKey);
    }

    /**
     * 用私密钥加密
     */
    public function private_encrypt($input) {
        openssl_private_encrypt($input,$output,$this->privKey);
        return base64_encode($output);
    }


    /**
     * 解密 私密钥加密后的密文
     */
    public function public_decrypt($input) {
        openssl_public_decrypt(base64_decode($input),$output,$this->pubKey);
        return $output;
    }

    /**
     * 用公密钥加密
     */
    public function public_encrypt($input) {
        openssl_public_encrypt($input,$output,$this->pubKey);
        return base64_encode($output);
    }


    /**
     * 解密 公密钥加密后的密文
     */
    public function private_decrypt($input) {
        openssl_private_decrypt(base64_decode($input),$output,$this->privKey,OPENSSL_PKCS1_PADDING);
        return $output;
    }
}