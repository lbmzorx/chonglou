<?php
namespace common\components\widget;


use Yii;
use yii\base\Widget;


/**
 * LinkPager displays a list of hyperlinks that lead to different pages of target.
 *
 * LinkPager works with a [[Pagination]] object which specifies the total number
 * of pages and the current page number.
 *
 * Note that LinkPager only generates the necessary HTML markups. In order for it
 * to look like a real pager, you should provide some CSS styles for it.
 * With the default configuration, LinkPager should look good using Twitter Bootstrap CSS framework.
 *
 * For more details and usage information on LinkPager, see the [guide article on pagination](guide:output-pagination).
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class LayuiUse extends Widget
{
    public $topMenu='0';
    public $sideTopMenu='';
    public $sideSubMenu='';

    public $options=[];
    public $layuiUse=['layerdate'];


    /**
     * Initializes the pager.
     */
    public function init()
    {
        if( empty($this->options['id'])){
            $this->options['id']='batch_delete';
        }
        if( empty($this->options['class'])){
            $this->options['class']='btn btn-success';
        }
    }

    /**
     * Executes the widget.
     * This overrides the parent implementation by displaying the generated page buttons.
     */
    public function run()
    {
        $this->renderJs();
    }

    public function renderJs(){
        $view = \yii::$app->getView();


    }

    public function renderSide(){


    }

    public function getMenu(){

    }


}
//MemnuList(){
// if(isset($this->params['left_nav'])){
//     foreach ($this->params['left_nav'] as $left_nav){
//         if(!empty($left_nav['item'])){
/*            <li><a href="#<?=str_replace('/','-',$left_nav['url'])?>" data-toggle="collapse"*/
/*                   class="<?=$this->params['left_nav_id']==$left_nav['id']?'active':'collapsed'?>"*/
/*                   aria-expanded="<?=$this->params['left_nav_id']==$left_nav['id']?'true':'false'?>">*/
/*                    <i class="fa fa-<?=$left_nav['icon']?>"></i>*/
//                    <span><?=$left_nav['name']?><!--</span><i class="icon-submenu lnr lnr-chevron-left"></i></a>-->
<!--                <div id="--><?//=str_replace('/','-',$left_nav['url'])?><!--"-->
<!--                     class="--><?//=$this->params['left_nav_id']==$left_nav['id']?'collapse in':'collapse'?><!-- ">-->
<!--                    <ul class="nav">-->
<!--                         foreach ($left_nav['item'] as $left_item){-->
<!--                            <li><a href="--><?//=$left_item['url']?><!--" class="--><?//=$this->params['left_nav_id']==$left_item['id']?'active':''?><!--">-->
<!--                                    --><?//=$left_item['name']?>
<!--                                </a>-->
<!--                            </li>-->
<!--                         endforeach;?>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </li>-->
<!--         else{-->
<!--            <li><a href="--><?//=$left_nav['url']?><!--" class="--><?//=$this->params['left_nav_id']==$left_nav['id']?'active':''?><!--">-->
<!--                    <i class="fa fa---><?//=$left_nav['icon']?><!--"></i> <span>--><?//=$left_nav['name']?><!--</span>-->
<!--                </a>-->
<!--            </li>-->
<!--         endif;?>-->
<!--     endforeach;?>-->
<!-- endif;?>-->
