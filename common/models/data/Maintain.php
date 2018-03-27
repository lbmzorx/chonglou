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

    const MAINTAIN_POSITION_TYPE_INDEX_BANNER = 0;
    const MAINTAIN_POSITION_TYPE_SIDE_BANNER = 1;
    const MAINTAIN_POSITION_TYPE_FIRM_AD = 2;
    /**
     * @var array $position_type_code 位置类型.0首页轮播,1侧栏1,2侧栏2
     */
    public static $position_type_code = [0=>'Index Banner',1=>'Side Banner',2=>'Firm Ad',];

    const MAINTAIN_SHOW_TYPE_IMAGE = 0;
    const MAINTAIN_SHOW_TYPE_TEXT = 1;
    const MAINTAIN_SHOW_TYPE_MARKDOWN = 2;
    /**
     * @var array $show_type_code 显示类型.0图片,2文字,3markdown
     */
    public static $show_type_code = [0=>'Image',1=>'Text',2=>'Markdown',];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['position_type'], 'in', 'range' => [0,1,2,],],
            [['show_type'], 'in', 'range' => [0,1,2,],],
            [['position_type'], 'default', 'value' =>0,],
            [['show_type'], 'default', 'value' =>0,],
            [['add_time'], 'default', 'value' =>0,],
            [['edit_time'], 'default', 'value' =>0,],
        ]);
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        return [
            'default' => [
                'position_type',
                'show_type',
                'name',
                'value',
                'sign',
                'url',
                'info',
            ],
            'search' => [
                'id',
                'position_type',
                'show_type',
                'name',
                'value',
                'sign',
                'url',
                'info',
                'add_time',
                'edit_time',
            ],
            'frontend' => [
                'id',
                'position_type',
                'show_type',
                'name',
                'value',
                'sign',
                'url',
                'info',
                'add_time',
                'edit_time',
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
