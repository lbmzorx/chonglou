<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-03-21 19:32
 */

namespace common\components\grid;

use common\components\widgets\LayuiUse;
use Yii;
use yii\helpers\Html;
use yii\web\View;

/**
 * @inheritdoc
 */
class StatusCodeColumn extends \yii\grid\DataColumn
{

    public $jsOptions=[];
    public static $uesed = 0;
    public function init()
    {
        parent::init();
        if(empty($this->jsOptions)) $this->jsOptions['btn']=[Yii::t('app','ok'),Yii::t('app','cance')];
    }

    protected function renderFilterCellContent()
    {

        $btn = implode('\',\'',$this->jsOptions['btn']);
        $laydateJs =<<<str
            $('.{$this->attribute}-change').click(function(){
                var sval=$(this).attr('key'),this_dom=$(this),
                    sid=$(this).attr('id-key');
                var dom_status_change=$('#{$this->attribute}-change-dom');
                
                dom_status_change.find('input[value="'+sval+'"]').prop('checked','true');
                dom_status_change.find('input[name="id"]').val(sid);
                
                layer.open({
                    'type':1,
                    'content':dom_status_change,
                    btn:['{$btn}'],
                    yes:function(layindex,laydom){
                        var dom_form=laydom.find('form');
                        $.post(dom_form.attr('action'),dom_form.serialize(),function(res){
                            if(res.status){
                                layer.msg(res.msg,{time:1000},function(){
                                    location.reload();
                                });
                            }else{
                               layer.msg(res.msg); 
                            }
                            layer.close(layindex);
                        },'json');
                    }
                });
            });

str;
        if(static::$uesed ==0){
            \yii::$app->getView()->registerJs($laydateJs);
        }
        return parent::renderFooterCellContent();
    }
}