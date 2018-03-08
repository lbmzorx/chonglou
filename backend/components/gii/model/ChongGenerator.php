<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/28
 * Time: 22:42
 */

namespace backend\components\gii\model;

use Yii;
use yii\base\InvalidParamException;
use yii\gii\CodeFile;
use yii\gii\generators\model\Generator;
use yii\helpers\Json;

class ChongGenerator extends Generator
{
    public $dataModelClass;
    public $timeAdd;
    public $timeUpdate;
    public $statusCode;
    public $statusCodeJson;
    public $withOneUser = true;
    public $statusCodeArray;

    public function rules()
    {
        $rules = [
            [['dataModelClass','statusCode','timeUpdate','timeAdd'] , 'filter' , 'filter' => 'trim'] ,
            [['statusCodeJson'] , 'filter' , 'filter' => 'trim'],
            [['statusCodeJson'],'required','when' => function($model){return !empty($model->statusCode);}],
            [['statusCodeJson'],'transferJson',],
            [['withOneUser'] , 'boolean' ,] ,
        ];
        return array_merge($rules , parent::rules());
    }

    public function hints()
    {
        return array_merge(parent::hints() , [
            'dataModelClass' => 'data of the model' ,
            'timeAdd'=>'insert event insert timestamp',
            'timeUpdate'=>'update event update timestamp',
            'statusCode'=>'status code',
            'statusCodeJson'=>"status Code with Json form,like ".
             "\$status=[0=>'waition',1=>'success',9=>'unknown'],Array in serialized like : \$publish=['no','yes'],".
             "you should input \n{\n\t\"cssCode\":{\"0\":\"warning\",\"1\":\"success\",\"9\":\"unknown\"},\n".
                "\t\"publish\":[\"no\",\"yes\"]\n}",
            'withOneUser'=>'With One User,Only id,name,head, if table has column of \'user_id\', you can use model as $model->with(\'user\') as one to one.',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function stickyAttributes()
    {
        return array_merge(parent::stickyAttributes() , ['dataModelClass','timeAdd','timeUpdate','statusCode','statusCodeJson','withOneUser']);
    }

    /**
     * @inheritdoc
     */
    public function generate()
    {
        $files = [];
        $relations = $this->generateRelations();
        $db = $this->getDbConnection();
        foreach ($this->getTableNames() as $tableName) {
            // model :
            $modelClassName = $this->generateClassName($tableName);
            $queryClassName = ($this->generateQuery) ? $this->generateQueryClassName($modelClassName) : false;
            $tableSchema = $db->getTableSchema($tableName);

            $params = [
                'tableName' => $tableName ,
                'className' => $modelClassName ,
                'queryClassName' => $queryClassName ,
                'tableSchema' => $tableSchema ,
                'properties' => $this->generateProperties($tableSchema) ,
                'labels' => $this->generateLabels($tableSchema) ,
                'rules' => $this->generateRules($tableSchema) ,
                'relations' => isset($relations[$tableName]) ? $relations[$tableName] : [] ,
            ];
            $files[] = new CodeFile(
                Yii::getAlias('@' . str_replace('\\' , '/' , $this->ns)) . '/' . $modelClassName . '.php' ,
                $this->render('model.php' , $params)
            );

            // query :
            if ($queryClassName) {
                $params['className'] = $queryClassName;
                $params['modelClassName'] = $modelClassName;
                $files[] = new CodeFile(
                    Yii::getAlias('@' . str_replace('\\' , '/' , $this->queryNs)) . '/' . $queryClassName . '.php' ,
                    $this->render('query.php' , $params)
                );
            }

            //data
            if ($this->dataModelClass) {
                $params['dataModelClass'] = $this->dataModelClass;
                $files[] = new CodeFile(
                    Yii::getAlias('@' . str_replace('\\' , '/' , ltrim($this->dataModelClass,'\\'))) . '.php' ,
                    $this->render('data.php' , $params)
                );
            }
        }

        return $files;
    }

    public function transferJson(){
        try{
            $json=Json::decode($this->statusCodeJson);
            $statusCode=explode(',',$this->statusCode);
            if($json ){
                foreach ($statusCode as $s){
                    if(!array_key_exists($s,$json)){
                        $this->addError('statusCodeJson',"{$s} should be existed in Status Json Code!");
                    }else{
                        $this->statusCodeArray[$s]=$json[$s];
                    }
                }
                if($this->hasErrors('statusCodeJson')){
                    return false;
                }
                return true;
            }
        }catch (InvalidParamException $e){
            $this->addError('statusCodeJson',$e->getMessage());
            return false;
        }
    }

    public function keysExist($key,$colums=[]){
        $statusCode=explode(',',$key);
        $in=array_intersect($statusCode,$colums);
        if(empty($in)){
            return false;
        }else{
            return true;
        }
    }
}