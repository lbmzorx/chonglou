<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/2
 * Time: 21:45
 */

namespace backend\components\actions;

use Yii;
use yii\base\Action;
use yii\web\Response;

class ChangeStatusAction extends Action
{
    public $modelClass;
    public $scenario = 'default';
    /** @var string 模板路径，默认为action id  */
    public $viewFile = 'index';

    /**
     * 状态参数
     * @return array|string
     */
    public function run()
    {
        /* @var $model yii\db\ActiveRecord */
        $request=yii::$app->getRequest();
        $id=$request->post('id');
        $key=$request->post('key');
        $value=$request->post('value');

        if($id && preg_match('/[\d]+/',$id)){
            $model = ($this->modelClass)::findOne($id);
            $model->setScenario( $this->scenario );
            if($model->load([$key=>$value],'')&&$model->save()){
                $msg= ['status'=>true,'msg'=>Yii::t('app','edit success')];
            }else{
                $msg= ['status'=>true,'msg'=>Yii::t('app',current($model->getFirstErrors()))];
            }
        }else{
            $msg= ['status'=>true,'msg'=>"Invalid id"];
        }

        if($request->isAjax){
            \yii::$app->getResponse()->format=Response::FORMAT_JSON;
            return $msg;
        }else{
            return $this->controller->redirect($this->viewFile);
        }
    }

}