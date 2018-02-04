<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/7
 * Time: 21:20
 */

namespace common\component\widget;

use common\assets\EditormdAsset;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\ActiveField;

class EditorMdField extends ActiveField
{
    public $mdOptions=[];
    public $mdJsOptions=[];

    public function textarea($options = [])
    {
        $options = array_merge($this->inputOptions, $options);
        $this->addAriaAttributes($options);
        $this->adjustLabelFor($options);

        $idMd=$this->getMdeditorId();
        $mdOptions=$this->mdOptions;

        $mdOptions=empty($mdOptions['id'])?array_merge($this->mdOptions,['id'=>$idMd]):$this->mdOptions;
        $this->parts['{input}'] = Html::tag('div',Html::activeTextarea($this->model, $this->attribute, $options),$mdOptions);
        $this->renderMdJs();

        return $this;
    }

    public function renderMdJs(){
        $view=\yii::$app->getView();
        EditormdAsset::register($view);
        $editormdUrl=$view->assetBundles[\common\assets\EditormdAsset::className()]->baseUrl;
        $idMd=$this->getMdeditorId();

        $mdJsOptions=ArrayHelper::merge($this->mdJsOptions,[
            'width'=>'100%',
            'height'=>'640',
            'syncScrolling'=>"single",
            'watch'=> false,
        ]);
        $mdJsOptions=ArrayHelper::merge($mdJsOptions,[
            'path'=>$editormdUrl.'/lib/',
            'name'=>$this->attribute,
        ]);

        $mdJsOptionsJson=Json::encode($mdJsOptions);
        $keymd=substr(md5($idMd),0,10);
        $view->registerJs("$(function() {var md$keymd=editormd('$idMd',$mdJsOptionsJson);})");
    }

    public function getMdeditorId(){
        $inputID = $this->getInputId();
        return "mdeditor$inputID";
    }
}