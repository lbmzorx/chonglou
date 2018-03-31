<?php
namespace common\models\data;

use Yii;

/**
* This is the data class for [[common\models\database\Maintain]].
*
* @see \common\models\database\Maintain
*/
class Maintain extends \common\models\database\Maintain
{

    const MAINTAIN_SHOW_TYPE_IMAGE = 0;
    const MAINTAIN_SHOW_TYPE_TEXT = 1;
    const MAINTAIN_SHOW_TYPE_MARKDOWN = 2;
    /**
     * @var array $show_type_code 显示类型.0图片,2文字,3markdown
     */
    public static $show_type_code = [0=>'Image',1=>'Text',2=>'Markdown',];

    const MAINTAIN_STATUS_UNAVAILABLE = 0;
    const MAINTAIN_STATUS_AVAILABLE = 1;
    /**
     * @var array $status_code 状态.0禁用,1启用
     */
    public static $status_code = [0=>'Unavailable',1=>'Available',];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['show_type'], 'in', 'range' => [0,1,2,],],
            [['status'], 'in', 'range' => [0,1,],],
            [['options_id'], 'default', 'value' =>'0',],
            [['show_type'], 'default', 'value' =>0,],
            [['add_time'], 'default', 'value' =>0,],
            [['edit_time'], 'default', 'value' =>0,],
            [['status'], 'default', 'value' =>1,],
        ]);
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        return [
            'default' => [
                'options_id',
                'show_type',
                'name',
                'value',
                'sign',
                'url',
                'info',
                'sort',
                'status',
            ],
            'search' => [
                'id',
                'options_id',
                'show_type',
                'name',
                'value',
                'sign',
                'url',
                'info',
                'sort',
                'add_time',
                'edit_time',
                'status',
            ],
            'frontend' => [
                'id',
                'options_id',
                'show_type',
                'name',
                'value',
                'sign',
                'url',
                'info',
                'sort',
                'add_time',
                'edit_time',
                'status',
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
            'timeUpdate'=>[
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['add_time'],
                    self::EVENT_BEFORE_UPDATE => ['edit_time'],
                ],
            ],
            'getStatusCode'=>[
                'class' => \common\components\behaviors\StatusCode::className(),
            ],
        ];
    }
}
