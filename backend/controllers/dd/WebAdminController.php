<?php
/**
 * Created by PhpStorm.
 * User: aa
 * Date: 2017/10/9
 * Time: 15:04
 */
namespace app\modules\admin\controllers;


/**
 * 网站运营信息
 * Class AuthController
 * @package app\modules\admin\controllers
 */
class WebAdminController extends CommonController
{
    /**
     * php信息
     */
   public function actionPhpinfo(){
       phpinfo();
   }

    /**
     * php opcache信息
     */
   public function actionOcp(){

//       $name="ocpajksd.3".date("Y-m-d-H")."@321sdmMSF32]";
//       $file='ocp'.md5($name).'.php';
       $file='ocp1ca48c417a0d5f050ab465b44923c7f1.php';
       if(!file_exists($file)){
          $msg=['status'=>false,'msg'=>'文件不存在'];
       }else{
          $msg=['status'=>true,'file'=>'/'.$file];
       }
       $file='ocp1ca48c417a0d5f050ab465b44923c7f1.php';
       return $this->renderPartial('ocp', $msg);
   }

    /**
     * php指针
     */
   public function actionPointer(){
       return $this->renderPartial('pointer');
   }

}