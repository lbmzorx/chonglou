<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/20
 * Time: 0:20
 */

namespace common\components\behaviors;


use common\models\data\ImgUpload;
use common\models\tool\UploadImg;
use yii\base\Behavior;
use yii\base\Exception;

class LogUpload extends Behavior
{
    public function events()
    {
        return [
            UploadImg::EVENT_AFTER_SAVEIMG =>'logImg',
        ];
    }

    public function logImg($event){
        $imgModel=$event->sender;
        $data['filePath']=$imgModel->getImgFullName();
        if(\yii::$app->id=='app-backend'){
            $data['admin_id']=\yii::$app->user->getId();
        }else{
            $data['user_id']=\yii::$app->user->getId();
        }
        $logModel=new ImgUpload();
        $logModel->load($data,'');
        $logModel->save();
    }

}