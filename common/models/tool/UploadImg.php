<?php
/**
 * Created by PhpStorm.
 * User: x_l
 * QQ:99628038
 * Date: 2016/12/26
 * Time: 15:08
 */

namespace common\models\tool;

use Yii;
use common\components\behaviors\ImageDeal;
use common\components\tools\Gd;
use yii\base\Exception;
use yii\base\Model;
use yii\base\ModelEvent;

class UploadImg extends Model
{
    const EVENT_BEFORE_SAVEIMG ='beforeSaveimg';
    const EVENT_AFTER_VALIDATE='afterSaveimg';

    const EVENT_BEFORE_UPLOAD='beforeUpload';
    const EVENT_AFTER_UPLOAD='afterUpload';


    /**
     * @var string
     */
    public $imgServer='http://www.chongloua.com/upload/';
    public $imgServerPath='@frontend/web/upload/';
   
    /**
     * @var \yii\web\UploadedFile $imageFile
     */
    public $imageFile;

    public $nameIsUnit;     //是否唯一
    public $nameModel;      //图片所在模型
    public $nameAttributs;  //图片生成唯一索引的模型的属性与值 ['app_id','user']
    public $nameParam;      //其他参数
    
    public $path;           //图片分类目录
    public $name;           //图片名字
    public $outName;        //图片的物理地址名
    public $urlName;        //图片的url名

    public $isthumb=true;   //是否加压缩，默认是
    public $iswater=false;  //是否加水印，默认否

    public function rules()
    {
        return [
            [['imageFile'],'image','maxWidth'=>2000,'maxHeight'=>2000,
                'notImage'=>'请上传正确的图片','overHeight'=>'图片高度不要超过{limit}','overWidth'=>'图片宽度不要超过{limit}'],
            [['imageFile'],'file','skipOnEmpty'=>false, 'extensions'=>'png,jpg','maxSize' => 3*1048576,
                'mimeTypes'=>['image/jpeg','image/png','image/jpg'],
                'wrongExtension'=>'请上传正确的图片','tooBig'=>'图片不要超过3M','wrongMimeType'=>'请上传正确的图片',],
        ];
    }

//    public function behaviors()
//    {
//        return [
//            'as_thumb'=>[                                               //压缩图片
//                'class'=>ImageDeal::className(),
//                'operate'=>ImageDeal::IMG_THUMB,
//                'operate_params'=>[600,600,Gd::IMAGE_THUMB_SCALE],      //缩略图的最大宽度和长度
//                'thumb_threshold'=>500*1024,                           //大于500k才压缩
//            ],
//            'as_water'=>[                                               //加水印
//                'class'=>ImageDeal::className(),
//                'operate'=>ImageDeal::IMG_WATER,
//                'operate_params'=>['favicon.jpg',],                     //水印图片源，水印的位置，水印的透明度
//            ],
//        ]; // TODO: Change the autogenerated stub
//    }

    public function upload()
    {
        if(!$this->beforeUpload()){
            return false;
        }
        if ($this->validate()) {
            if(!is_file($this->outName)){
                $path=$this->getFullPath();
                $name=$this->getFullFile();
            }else{
                $name=$this->outName;
            }
            if(!$this->beforeSaveImg()){
                return false;
            }
//            throw new Exception($name.'-'.$this->outName.'--'.$this->getPath().'-'.$this->getName().'--'.$this->getFullFile());
            $this->imageFile->saveAs($name);
            $this->setUrlName();


            if(!$this->afterSaveImg()){
                return false;
            }
            if(!$this->afterUpload()){
                return false;
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * 获取文件名
     * @return mixed
     */
    public function getName(){
        if($this->name==''){
            $key=$this->generateNameKey();
            if($this->nameIsUnit==false){  //生成唯一名
                $key.=microtime().rand();//随便写的加密KEY
            }
            $this->name = md5($this->imageFile->baseName . $key );
        }
        return $this->name;
    }

    protected function generateNameKey(){
        $key='s29vbFKjkdsJfj';
        if(is_object($this->nameModel)){
            $key.=get_class($this->nameModel);
            foreach ($this->attributes as $v){
                $key.=$v.$this->nameModel->{$v};
            }
        }
        $key.=serialize($this->nameParam);
        return $key;
    }

    /**
     * 设置文件名
     * @param string $name
     */
    public function setName($name=''){
        if($name==''){
            $name=$this->getName();
        }
        return $name;
    }

    public function getPath(){
        if($this->path == ''){
            $this->path = 'img';
        }
        return $this->path;
    }

    public function setPath($path=''){
        if($path==''){
            $path = $this->getPath();
        }
        return $path;
    }

    public function getFullPath(){
        $path=Yii::getAlias($this->imgServerPath.$this->getPath());
        if(! is_dir($path)){
            mkdir($path, 0755, true);
        }
        return $path;
    }

    public function getFullFile(){
        return Yii::getAlias($this->imgServerPath.$this->getOutName());
    }

    public function setUrlName(){
        $this->urlName=$this->imgServer.$this->getOutName();
    }

    public function getOutName(){
        if(!$this->outName){
            $this->outName=$this->getPath().'/'.$this->getName().'.'.$this->imageFile->extension;
        }
        return $this->outName;
    }

    /**
     * 设置上传后文件名包括路径与拓展名
     * @param string $name
     */
    public function setOutName($outName=''){
        if($outName==''&&$this->outName==''){
            $this->outName= $this->getPath().'/'.$this->getName(). '.' . $this->imageFile->extension;
        }else{
            if($outName){
                $this->outName=$outName;
            }
        }
    }

    public function getUrlName(){
        return $this->imgServer.$this->outName;
    }

    public function beforeSaveImg(){
        $event = new ModelEvent;
        $this->trigger(self::EVENT_BEFORE_VALIDATE, $event);
        return $event->isValid;
    }

    public function afterSaveImg(){
        $event = new ModelEvent;
        $this->trigger(self::EVENT_AFTER_VALIDATE, $event);
        return $event->isValid;
    }

    public function beforeUpload(){
        $event = new ModelEvent;
        $this->trigger(self::EVENT_BEFORE_UPLOAD, $event);
        return $event->isValid;
    }

    public function afterUpload(){
        $event = new ModelEvent;
        $this->trigger(self::EVENT_AFTER_UPLOAD, $event);
        return $event->isValid;
    }
}