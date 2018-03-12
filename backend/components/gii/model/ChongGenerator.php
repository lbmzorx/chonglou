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
use yii\helpers\Inflector;
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

    public $labelExplain=true;
    public $labelTran=true;
    public $targetLanguage='zh-CN';

    public function rules()
    {
        $rules = [
            [['dataModelClass','statusCode','timeUpdate','timeAdd'] , 'filter' , 'filter' => 'trim'] ,
            [['statusCodeJson'] , 'filter' , 'filter' => 'trim'],
            [['statusCodeJson'],'required','when' => function($model){return !empty($model->statusCode);}],
            [['statusCodeJson'],'transferJson',],
            [['withOneUser','labelExplain','labelTran'] , 'boolean' ,] ,
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
            'labelExplain'=>'Table commit be used to explain label',
            'labelTran'=>'Tanslation label to translation file',
            'targetLanguage'=>'Translation label to target language by used table comments',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function stickyAttributes()
    {
        return array_merge(parent::stickyAttributes() , ['dataModelClass','timeAdd','timeUpdate','statusCode',
            'statusCodeJson','withOneUser','labelExplain','labelTran','targetLanguage']);
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
            if($this->labelTran){
                $files[] = $this->generateTranslationFile($params['className'],$params['properties']);
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


    public function generateLabelsTran($properties,$file_content,$className){

        $start='\/\*start\*'.$className.'\*\/';
        $end = '\/\*end\*'.$className.'\*\/';
        $commontstart='\/\*start\*'.'NameCommon'.'\*\/';
        $commontend = '\/\*end\*'.'NameCommon'.'\*\/';

        $common_content='';
        if($file_content){
            if(preg_match('/('.$commontstart.')([.\s\S]*)('.$commontend.')/',$file_content,$match)){
                $common_content=$match[2];
                $file_content=preg_replace('/('.$commontstart.')([.\s\S]*)('.$commontend.')/','${1} ${3}',$file_content);
            }
        }

        $labels=[];
        $commonName=[];
        foreach ($properties as $name=>$property){

            if (!strcasecmp($name, 'id')) {
                $label="ID";
            } else {
                $label = Inflector::camel2words($name);
                if (!empty($label) && substr_compare($label, ' id', -3, 3, true) === 0) {
                    $label = substr($label, 0, -3) . ' ID';
                }
            }

            if(preg_match('/(\''.$label.'\'=>\')(.*)/',$file_content,$match_other)){
                $file_content=preg_replace('/'."'".$label."'".'=>\'/','//${0}',$file_content);
                if(preg_match('/('."'".$label."'".'=>\')/',$common_content,$match_commont)){
                    continue;
                }else{
                    $commonName[$label]=$match_other[2];
                    continue;
                }
            }elseif(preg_match('/(\''.$label.'\'=>\')/',$common_content,$matcha)){
                continue;
            }
            $labels[$label] =preg_replace('/[\.]/',"',//",$property['comment']);

        }

        foreach ($commonName as $name=>$attribute){
            $common_content.="\t'{$name}'=>'{$attribute}',\n";
        }
        $tranCommon="\t".'/*start*NameCommon*/'."\n".$commontend."\t/*end*NameCommon*/\n";
        if(preg_match('/('.$commontstart.')([.\s\S]*)('.$commontend.')/',$file_content)){
            $tranCommon=preg_replace('/('.$commontstart.')([.\s\S]*)('.$commontend.')/','${1}'."\n".$common_content."\t".'${3}'."\n",$file_content);
        }else{
            $tranCommon=$tranCommon.$file_content;
        }

        $replace='';
        foreach ($labels as $name=>$label){
            $replace.="\t'{$name}'=>'{$label}',\n";
        }

        $tran="\t".'/*start*'.$className.'*/'."\n".$replace."\t/*end*$className*/\n";
        if(preg_match('/('.$start.')([.\s\S]*)('.$end.')/',$tranCommon)){
            $tran=preg_replace('/('.$start.')([.\s\S]*)('.$end.')/','${1}'."\n".$replace."\t".'${3}'."\n",$tranCommon);
        }else{
            $tran=$tranCommon.$tran;
        }


        return $tran;
    }



    public function generateTranslationFile($className,$properties){
        $messageCategory=\Yii::$app->i18n->translations[$this->messageCategory];
        $basepath=isset($messageCategory['basePath'])?$messageCategory['basePath']:'@app/messages';
        $file = Yii::getAlias($basepath).'/'.$this->targetLanguage.'/'.$this->messageCategory.'.php';

        $filestart='<\?php[\s\S.]+return\s+\[';
        $fileend = '\];';

        $start='\/\*start\*'.$className.'\*\/';
        $end = '\/\*end\*'.$className.'\*\/';

        $file_content='';

        if( file_exists($file)){
            $content=file_get_contents($file);
            if(preg_match('/('.$filestart.')([.\s\S]*)('.$fileend.')/',$content,$match)){
                $file_content=$match[2];
            }
            if(preg_match('/('.$start.')([.\s\S]*)('.$end.')/',$file_content)){
                $file_content=preg_replace('/('.$start.')([.\s\S]*)('.$end.')/','${1}  ${3}',$file_content);
            }
        }
        $labels=$this->generateLabelsTran($properties,$file_content,$className);

        return new CodeFile(
            $file,
            $this->render('translation.php',['tran'=>$labels])
        );

    }

}