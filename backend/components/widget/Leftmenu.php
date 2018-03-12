<?php
namespace backend\components\widget;


use common\components\tools\Cate;
use common\models\data\Menu;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;


/**
 * LinkPager displays a list of hyperlinks that lead to different pages of target.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Leftmenu extends Widget
{
    public $top='0';
    public $left='';
    public $leftsub='';
    public $leftleftsub='';

    public $allpath='';

    public $options=[];

    public $depency;
    public $depency_filename='@backend/runtime/depency/backend_menu.txt';

    /**
     * @var \yii\caching\FileCache
     */
    public $cache='\yii\caching\FileCache';
    public $cacheOption=[];

    public $duration=8640000; // 100 days
    /**
     * Initializes the pager.
     */
    public function init()
    {
        parent::init();
        $this->getCache();
    }

    public function getCache(){
        if(is_object($this->cache)==false){
            if( is_string($this->cache) && class_exists($this->cache)){
                $this->cache=Yii::createObject($this->cache,$this->cacheOption);
            }else{
                $this->cache=\yii::$app->cache;
            }
        }
        return $this->cache;
    }
    
    /**
     * Executes the widget.
     * This overrides the parent implementation by displaying the generated page buttons.
     */
    public function run()
    {
        echo $this->renderSide();
    }

    public function renderSide(){

//        $cache=$this->getCache();
//        $key = ['top','top'=>$this->top,__METHOD__];
//        $string=$cache->get($key);
//        if( $string ){
//            return $string;
//        }
        $string='';
        if($menu=$this->getMenuSide()){
            foreach ($menu as $k=>$v){
                if(!empty($v['sub'])) {
                    $string .= '<li data-id=""><a href="#' . md5($v['url'].$v['module']) . '" data-toggle="collapse"' .
                        'class="' . ($v['module'] == $this->left ? 'active' : 'collapsed') . '"' .
                        'aria-expanded="'. ($v['module'] == $this->left ? 'true' : 'false') . '">' .
                            '<i class="' . Html::encode($v['icon']) . '"></i>' .
                            '<span>' . Html::encode($v['name']) . '</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>' .
                            '<div id="' . md5($v['url'].$v['module']) . '"' .
                            'class="' . ($v['module'] == $this->left ? 'collapse in' : 'collapse') . '">' .
                            '<ul class="nav">';
                    foreach ($v['sub'] as $vv) {
                        $string .= '<li><a href="' . Html::encode($vv['url']) . '" class="' . ($this->leftsub == $vv['controller'] ? 'active' : '') . '">' .
                            '<i class="' . Html::encode($v['icon']) . '"></i>' .
                            Html::encode($vv['name']) . '</a></li>';
                    };
                    $string .= '</ul></div></li>';
                }else{
                    $string.='<li><a href="'.Html::encode($v['url']).'" class="'.($this->left==$v['module']?'active':'').'">'.
                        '<i class="'.Html::encode($v['icon']).'"></i> <span>'.Html::encode($v['name']).'</span></a></li>';
                }
            }
        }

//        $dependency = new \yii\caching\FileDependency(['fileName' => $this->depency_filename]);
//        $cache->set($key,$string,$this->duration,$dependency);

        return $string;
    }

    /**
     *
     */
    public function getMenuSide(){
        $menu=Menu::find()->where([
            'app_type'=>Menu::MENU_APP_TYPE_BACKEND,
            'is_display'=>Menu::MENU_IS_DISPLAY_YES,
            'position'=>Menu::MENU_POSITION_LEFT,
        ])->andFilterWhere(['top_id'=>$this->top])->orderBy(['id'=>SORT_ASC,'sort'=>SORT_ASC])->asArray()->all();

        return Cate::array_cate_as_subarray($menu,0,'parent_id');
    }


}
