<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/7
 * Time: 21:20
 */

namespace common\components\widget;

use yii\widgets\ActiveField;
class UploadImgField extends ActiveField
{
    public $imgOptions=[];

    public function fileInput($options = [])
    {
        return parent::fileInput($options);
    }

    public function renderJs(){

    }

}