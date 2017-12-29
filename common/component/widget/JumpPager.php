<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace common\component\widget;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Request;
use yii\widgets\LinkPager;


class JumpPager extends LinkPager
{
    /**跳转**/    
    public $jOptions=[                  //跳转容器
        'class' => 'pagination',
        'style'=>"margin-left: 10px;vertical-align: middle;",
    ];

    public $jLiInputCssClass='';        //跳转输入框li元素类
    public $jLiInputOptions=[];         //跳转输入框li元素选项
    public $jLiButtonCssClass;          //跳转按钮li元素类
    public $jLiButtonOptions=[];        //跳转按钮li元素选项

    public $jInputOptions=[             //跳转输入框input元素选项，可以重写改线以得新的样式
        'style'=>"
        height: 35px;
		border-bottom-left-radius: 4px;
    	border-top-left-radius: 4px;
    	background-color: #fff;
    	border: 1px solid #ddd;
	    color: #337ab7;   
	    line-height: 1.42857;
	    margin-left: -1px;
	    padding: 6px 0px 6px 6px;
	    width: 60px;
	    position: relative;
	    text-decoration: none;",
        'onkeyup'=>'',
        'onchange'=>'',
    ];
    public $jButtonOptions = [          //跳转输入框button元素选项，可以重写改线以得新的样式
        'style'=>"float: right;"
    ];

    public $jInpuType='number';         //跳转input类型
    public $jButtonLabel='跳转';         //跳转按钮名称

    public $jInputIdHeader='ji';        //跳转输入框id的前缀
    public $jButtonIdHeader='jb';       //跳转按钮id的前缀
    public static $jCounter=0;          //当前页跳转的计数

    public $sOptions=[                  //跳转容器
        'class' => 'pagination',
        'style'=>'margin-left: 10px;vertical-align: middle;float:right',
    ];

    public $sLiInputCssClass;           //跳转输入框li元素类
    public $sLiInputOptions=[];         //跳转输入框li元素选项
    public $sLiButtonCssClass;          //跳转按钮li元素类
    public $sLiButtonOptions=[];        //跳转按钮li元素选项

    public $sInpuType='number';         //跳转input类型
    public $sButtonLabel='设置';         //跳转按钮名称

    public $sInputOptions=[             //跳转输入框input元素选项，可以重写改线以得新的样式
        'style'=>"
		height: 35px;
		border-bottom-left-radius: 4px;
    	border-top-left-radius: 4px;
    	background-color: #fff;
    	border: 1px solid #ddd;
	    color: #337ab7;   
	    line-height: 1.42857;
	    margin-left: -1px;
	    padding: 6px 0px 6px 6px;
	    width: 60px;
	    position: relative;
	    text-decoration: none;
    	",

    ];
    public $sButtonOptions=[            //跳转输入框button元素选项，可以重写改线以得新的样式
        'style'=>"float: right;",
    ];

    public $sInputIdHeader='si';        //跳转输入框id的前缀
    public $sButtonIdHeader='sb';       //跳转按钮id的前缀
    public static $sCounter=0;          //当前页跳转的计数

    /**
     * Executes the widget.
     * This overrides the parent implementation by displaying the generated page buttons.
     */
    public function run()
    {
        parent::run();
        echo $this->renderJButtons();
        echo $this->renderSButtons();
    }

    /**
     * Renders the page buttons.
     * @return string the rendering result
     */
    protected function renderJButtons()
    {
        return $this->renderTemplateButtons('j',$this->pagination->pageParam);
    }

    /**
     *
     * @return string
     */
    protected function renderSButtons(){
        return $this->renderTemplateButtons('s',$this->pagination->pageSizeParam);
    }

    protected function renderTemplateButtons($type,$pageParams){
        $pageCount = $this->pagination->getPageCount();
        if ($pageCount < 2 && $this->hideOnSinglePage) {
            return '';
        }
        if(!$this->sButtonLabel){
            return '';
        }

        $buttons = [];
        $page=$this->pagination->getPage();
        $pageSize=$this->pagination->getPageSize();
        $BaseUrl=$this->unsetUrlParams($pageParams);

        $inputParam=$type=='j'?$page:$pageSize;
        $buttons[]=$this->renderTemplateInput($type,$inputParam,$BaseUrl);
        $buttons[]=$this->renderTemplateButton($type,$page);

        $options = $this->{$type.'Options'};
        $tag = ArrayHelper::remove($options, 'tag', 'ul');
        return Html::tag($tag, implode("\n", $buttons), $options);
    }

    /**
     * 渲染跳转页input框
     * @param $page
     * @param $baseUrl
     * @return string
     */
    protected function renderJInput($page,$baseUrl)
    {
        $options = $this->jLiButtonOptions;
        $linkWrapTag = ArrayHelper::remove($options, 'tag', 'li');
        Html::addCssClass($options, $this->jLiInputCssClass);

        $linkOptions = $this->jInputOptions;

        $counter=self::$jCounter;
        $linkOptions['min']=1;
        $linkOptions['max']=$this->pagination->getPageCount();
        $linkOptions['id']=$this->jInputIdHeader.$counter;
        $linkOptions['baseurl']=$baseUrl;

        if(empty($linkOptions['js'])){
            $this->renderJs($linkOptions['id'],$this->jButtonIdHeader.$counter,$linkOptions['max'],$this->pagination->pageParam);
        }

        return Html::tag($linkWrapTag, Html::input($this->jInpuType,empty($linkOptions['name'])?'name':$linkOptions['name'],$page+1,$linkOptions), $options);

    }

    /**
     * 渲染跳转按钮
     * @param $page
     * @return string
     */
    protected function renderJButton($page)
    {
        $options = $this->jLiButtonOptions;
        $linkWrapTag = ArrayHelper::remove($options, 'tag', 'li');
        Html::addCssClass($options, $this->jLiButtonCssClass);

        $buttonOptions = $this->jButtonOptions;
        $buttonOptions['id']=$this->jButtonIdHeader.self::$jCounter;
        return Html::tag($linkWrapTag, Html::a($this->jButtonLabel,$this->pagination->createUrl($page),$buttonOptions),$options);
    }

    /**
     * 单页记录数量输入框
     * @param $pageSize
     * @param $baseUrl
     * @return string
     */
    protected function renderSInput($pageSize,$baseUrl)
    {
        $options = $this->sLiInputOptions;
        $linkWrapTag = ArrayHelper::remove($options , 'tag' , 'li');
        Html::addCssClass($options, $this->sLiInputCssClass);

        $linkOptions = $this->sInputOptions;
        $counter = self::$sCounter;
        $linkOptions['min'] = 1;
        $linkOptions['max'] = $this->pagination->pageSizeLimit[1];
        $linkOptions['id'] = $this->sInputIdHeader.$counter;
        $linkOptions['baseurl']=$baseUrl;

        if($linkOptions['js']!==false){
            $this->renderJs($linkOptions['id'],$this->sButtonIdHeader.$counter,$linkOptions['max'],$this->pagination->pageSizeParam);
        }

        return Html::tag($linkWrapTag,Html::input($this->sInpuType,empty($linkOptions['name'])?'name':$linkOptions['name'],$pageSize,$linkOptions),$options);
    }

    protected function renderTemplateInput($type,$inputParam,$baseUrl){
        $options = $this->{$type.'LiInputOptions'};
        $linkWrapTag = ArrayHelper::remove($options , 'tag' , 'li');
        Html::addCssClass($options, $this->{$type.'LiInputCssClass'});

        $linkOptions = $this->{$type.'InputOptions'};
        $counter = self::${$type.'Counter'};
        $linkOptions['min'] = 1;

        $linkOptions['max'] = $type=='j'?$this->pagination->getPageCount():$this->pagination->pageSizeLimit[1];
        $linkOptions['id'] = $this->{$type.'InputIdHeader'}.$counter;
        $linkOptions['baseurl']=$baseUrl;

        if($linkOptions['js']!==false){
            $jsParam=$type=='j'?$this->pagination->pageParam:$this->pagination->pageSizeParam;
            $this->renderJs($linkOptions['id'],$this->{$type.'ButtonIdHeader'}.$counter,$linkOptions['max'],$jsParam);
        }

        return Html::tag($linkWrapTag,Html::input($this->{$type.'InpuType'},empty($linkOptions['name'])?'name':$linkOptions['name'],$inputParam,$linkOptions),$options);

    }

    protected function renderTemplateButton($type,$page){
        $options = $this->{$type.'LiButtonOptions'};
        $linkWrapTag = ArrayHelper::remove($options, 'tag', 'li');
        Html::addCssClass($options, $this->{$type.'LiButtonCssClass'});

        $buttonOptions = $this->{$type.'ButtonOptions'};
        $buttonOptions['id']=$this->{$type.'ButtonIdHeader'}.self::${$type.'Counter'};
        return Html::tag($linkWrapTag, Html::a($this->{$type.'ButtonLabel'},$this->pagination->createUrl($page),$buttonOptions),$options);
    }

    /**
     * 渲染设置单页记录数按钮
     * @param $page
     * @return string
     */
    protected function renderSButton($page)
    {
        $options = $this->sLiButtonOptions;
        $linkWrapTag = ArrayHelper::remove($options, 'tag', 'li');
        Html::addCssClass($options, $this->sLiButtonCssClass);

        $buttonOptions = $this->sButtonOptions;
        $buttonOptions['id']=$this->sButtonIdHeader.self::$jCounter;
        return Html::tag($linkWrapTag, Html::a($this->sButtonLabel,$this->pagination->createUrl($page),$buttonOptions),$options);
    }

    /**
     * 渲染页面js
     * @param $idInput
     * @param $idButton
     * @param $max
     * @param $pageName
     */
    protected function renderJs($idInput,$idButton,$max,$pageName){
        \yii::$app->view->registerJs(<<<SCRIPT
            $('#$idInput').keyup(function(){jump$idInput();});        
            $('#$idInput').change(function(){jump$idInput();});
            function jump$idInput(){
                var v=$('#$idInput').val();
                v=/^[\d]+$/.test(v)&&(v>=1)&&(v<=$max)?v:1;
                $(this).val(v);           
                $('#$idButton').attr('href',$('#$idInput').attr('baseurl')+'&$pageName='+v);
            }        
SCRIPT
        );
    }
    
    /**
     * 去掉url中的某个参数
     * @param $pageName
     * @return string
     */
    protected function unsetUrlParams($paraName){
        $request = Yii::$app->getRequest();
        $params = $request instanceof Request ? $request->getQueryParams() : [];

        $pageSize = $this->pagination->getPageSize();
        $params[$this->pagination->pageSizeParam] = $pageSize;
        $page    = $this->pagination->getPage();
        $params[$this->pagination->pageParam] = $page;

        unset($params[$paraName]);

        $params[0] = $this->pagination->route === null ? Yii::$app->controller->getRoute() : $this->pagination->route;
        return \yii::$app->urlManager->createUrl($params);
    }
}
