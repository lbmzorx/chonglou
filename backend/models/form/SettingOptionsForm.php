<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2016-10-21 14:40
 */

namespace backend\models\form;

use common\components\tools\ModelHelper;
use yii;
use common\models\data\Options as DataOptions;

class SettingOptionsForm extends yii\base\Model
{


    /**
     * 获取设置值
     */
    public function readOptions()
    {
        $names = $this->getAttributes();
        $models=DataOptions::find()->select(['name','value'])->where(['name'=>array_keys($names)])->indexBy('name')->asArray()->all();
        foreach ($models as $name=>$value) {
            $this->$name = $value['value'];
        }
    }


    /**
     * 写入数据库，设置项
     *
     * @return bool
     */
    public function saveOptions()
    {
        $names = $this->getAttributes();
        $models=DataOptions::find()->where(['name'=>array_keys($names)])->indexBy('name')->all();
        $t=\yii::$app->db->beginTransaction();
        foreach ($models as $name=>$model) {
            $model->value = $this->$name;
            $result = $model->save();
            if ($result == false) {
                $errors = $model->getErrors();
                $err=ModelHelper::getErrorAsString($errors);
                $this->addError($name,$err);
                $t->rollBack();
                return $result;
            }
        }
        $new=array_diff(array_keys($names),array_keys($models));
        if(!empty($new)){
            $option=new DataOptions();
            $option->loadDefaultValues();
            foreach ($new as $name){
                $option->name=$name;
                $option->value=$this->$name;
                if( !$option->validate() && !$option->save()){
                    $errors = $option->getErrors();
                    $err=ModelHelper::getErrorAsString($errors);
                    $this->addError($name,$err);
                    $t->rollBack();
                    return false;
                }
                $option->id=null;
            }
        }
        $t->commit();
        return true;
    }
}