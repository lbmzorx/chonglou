<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\components\gii\crud;

use Yii;
use yii\gii\CodeFile;
/**
 * Generates CRUD
 *
 * @property array $columnNames Model column names. This property is read-only.
 * @property string $controllerID The controller ID (without the module ID prefix). This property is
 * read-only.
 * @property string $nameAttribute This property is read-only.
 * @property array $searchAttributes Searchable attributes. This property is read-only.
 * @property bool|\yii\db\TableSchema $tableSchema This property is read-only.
 * @property string $viewPath The controller view path. This property is read-only.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Generator extends \yii\gii\generators\crud\Generator
{

    public $changeStatus = '';
    public $timedate = '';
    public $topSideMemu;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
           [['changeStatus','timedate','topSideMemu'],'string'],
            ['viewPath', 'safe'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'changeStatus'=>'Change Status',
            'timedate'=>'Time Date',
            'topSideMemu'=>'Top Side Menu Id'
        ]);
    }

    /**
     * @inheritdoc
     */
    public function hints()
    {
        return array_merge(parent::hints(), [
            'changeStatus' => 'column you want to change status',
            'timedate' =>'time with timestamp',
            'topSideMemu'=>'top side memu'
        ]);
    }


    /**
     * @inheritdoc
     */
    public function stickyAttributes()
    {
        return array_merge(parent::stickyAttributes(), ['changeStatus','timedate','topSideMemu']);
    }

    /**
     * @inheritdoc
     */
    public function generate()
    {
        $controllerFile = Yii::getAlias('@' . str_replace('\\', '/', ltrim($this->controllerClass, '\\')) . '.php');

        $files = [
            new CodeFile($controllerFile, $this->render('controller.php')),
        ];

        if (!empty($this->searchModelClass)) {
            $searchModel = Yii::getAlias('@' . str_replace('\\', '/', ltrim($this->searchModelClass, '\\') . '.php'));
            $files[] = new CodeFile($searchModel, $this->render('search.php'));
        }

        $viewPath = $this->getViewPath();
        $templatePath = $this->getTemplatePath() . '/views';
        foreach (scandir($templatePath) as $file) {
            if (empty($this->searchModelClass) && $file === '_search.php') {
                continue;
            }
            if (is_file($templatePath . '/' . $file) && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                $files[] = new CodeFile("$viewPath/$file", $this->render("views/$file"));
            }
        }

        return $files;
    }

    public function generateStatusCodeColum($column){
        if($this->changeStatus){
            $changeStatus=explode(',',$this->changeStatus);
            if(in_array($column,$changeStatus)){
                $string="[\n".
"               'class'=>\common\components\grid\StatusCodeColumn::className(),\n".
"               'attribute'=>'{$column}',\n".
"               'filter'=>{$this->modelClass}::\${$column}_code,\n".
"               'value'=> function (\$model) {\n".
"                   return Html::button(\$model->getStatusCode('{$column}','{$column}_code'),\n".
"                       ['data-id'=>\$model->id,'class'=>'{$column}-change btn btn-xs btn-'.\$model->getStatusCss('{$column}','{$column}_css',\$model->{$column})]);\n".
"               },\n".
"               'format'=>'raw',\n".
"            ]";
                return $string;
            }
        }
        return false;
    }

    public function generateTimeDate($column){
        if($this->timedate){
            $timedate=explode(',',$this->timedate);
            if(in_array($column,$timedate)){
                $string="[\n".
                    "               'class'=>\common\components\grid\DateTimeColumn::className(),\n".
                    "               'attribute'=>'{$column}',\n".
                    "            ]";
                return $string;
            }
        }
        return false;
    }

    public function generateStatusCodeDom($column){
        $string=
            <<<DOM
<div id="{$column}-change-dom" style="display: none;">
    <div style="padding: 10px;">
        <?=Html::beginForm(['change-status'],'post')?>
        <input type="hidden" name="key" value="{$column}">
        <input type="hidden" name="id" value="">
        <?php foreach ( {$this->modelClass}::\${$column}_code as \$k=>\$v):?>           
            <label class="checkbox-inline" style="margin: 5px 10px;">
                <?php
                    \$css='warning';
                    if( isset({$this->modelClass}::\${$column}_css) && isset({$this->modelClass}::\${$column}_css[\$k])){
                        \$css = {$this->modelClass}::\${$column}_css [\$k];
                    }else{
                        \$css=isset(\common\components\behaviors\StatusCode::\$cssCode[\$k])?\common\components\behaviors\StatusCode::\$cssCode[\$k]:\$css;
                    }
                ?>               
                <?=Html::input('radio','value',\$k)?>
                <?=Html::tag('span',\$v,['class'=>'btn btn-'.\$css])?>
            </label>          
        <?php endforeach;?>
        <?=Html::endForm()?>
    </div>
</div>
DOM;
        return $string;
    }

}
