<?php
namespace common\models\data;

use Yii;

/**
* This is the data class for [[common\models\database\Options]].
*
* @see \common\models\database\Options
*/
class Options extends \common\models\database\Options
{

    const OPTIONS_TYPE_SYSTEM = 0;
    const OPTIONS_TYPE_SELF = 1;
    const OPTIONS_TYPE_BANNER = 2;
    const OPTIONS_TYPE_AD = 3;
    /**
     * @var array $type_code 类型.0系统,1自定义,2banner,3广告
     */
    public static $type_code = [0=>'system',1=>'self',2=>'banner',3=>'ad',];

    const OPTIONS_INPUT_TYPE_INPUT = 0;
    const OPTIONS_INPUT_TYPE_TEXTEARE = 1;
    const OPTIONS_INPUT_TYPE_IMG = 2;
    const OPTIONS_INPUT_TYPE_MARKDOWN = 3;
    /**
     * @var array $input_type_code 输入框类型
     */
    public static $input_type_code = [0=>'input',1=>'texteare',2=>'img',3=>'markdown',];

    const OPTIONS_AUTOLOAD_NO = 0;
    const OPTIONS_AUTOLOAD_YES = 1;
    /**
     * @var array $autoload_code 自动加载.0否,1是
     */
    public static $autoload_code = [0=>'no',1=>'yes',];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['type'], 'in', 'range' => [0,1,2,3,],],
            [['input_type'], 'in', 'range' => [0,1,2,3,],],
            [['autoload'], 'in', 'range' => [0,1,],],
            [['type'], 'default', 'value' =>'0',],
            [['input_type'], 'default', 'value' =>1,],
            [['autoload'], 'default', 'value' =>1,],
            [['tips'], 'default', 'value' =>'',],
            [['sort'], 'default', 'value' =>'0',],
        ]);
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        return [
            'default' => [
                'type',
                'name',
                'value',
                'input_type',
                'autoload',
                'tips',
                'sort',
            ],
            'search' => [
                'id',
                'type',
                'name',
                'value',
                'input_type',
                'autoload',
                'tips',
                'sort',
            ],
            'frontend' => [
                'id',
                'type',
                'name',
                'value',
                'input_type',
                'autoload',
                'tips',
                'sort',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(),[

        ]);
    }

    public function behaviors()
    {
        return [
            'getStatusCode'=>[
                'class' => \common\components\behaviors\StatusCode::className(),
            ],
        ];
    }
}
