<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/28
 * Time: 22:42
 */

namespace backend\components\gii\model;

use Yii;
use yii\gii\CodeFile;
use yii\gii\generators\model\Generator;

class ChongGenerator extends Generator
{
    public $dataModelClass;
    public $behaviorTimeAdd;
    public $behaviorTimeUpdate;
    public $behaviorCode;
    public function rules()
    {
        $rules = [
            [['dataModelClass','behaviorTimeAdd','behaviorTimeUpdate','behaviorCode'] , 'filter' , 'filter' => 'trim'] ,
        ];
        return array_merge($rules , parent::rules());
    }

    public function hints()
    {
        return array_merge(parent::hints() , [
            'dataModelClass' => 'data of the model' ,
            'behaviorTimeAdd'=>'insert event insert timestamp',
            'behaviorTimeUpdate'=>'update event update timestamp',
            'behaviorCode'=>'status code',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function stickyAttributes()
    {
        return array_merge(parent::stickyAttributes() , ['dataModelClass','behaviorTimeAdd','behaviorTimeUpdate','behaviorCode',]);
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
                    Yii::getAlias('@' . str_replace('\\' , '/' , $this->dataModelClass)) . '.php' ,
                    $this->render('data.php' , $params)
                );
            }
        }

        return $files;
    }
}