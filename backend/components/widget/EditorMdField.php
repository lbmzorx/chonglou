<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/7
 * Time: 21:20
 */

namespace backend\components\widget;


use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class EditorMdField extends \common\components\widget\EditorMdField
{
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub


        $this->mdJsOptions=ArrayHelper::merge($this->mdJsOptions,[
            'imageUpload'=>true,
            'imageFormats'=>["jpg", "jpeg", "png"],
            'imageUploadURL'=>Url::to(['/article/default/upload']),
            'imageInputName'=>'UploadImg[imageFile]',
            'imageCsrfName'=>\yii::$app->getRequest()->csrfParam,
            'imageCsrfTocken'=>\yii::$app->getRequest()->getCsrfToken(),
        ]);
    }

    public function renderMdJs()
    {
        parent::renderMdJs(); // TODO: Change the autogenerated stub

        $view=\yii::$app->getView();
        $view->registerJs(<<<script

script
);
    }
}