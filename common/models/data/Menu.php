<?php
namespace common\models\data;

use Yii;

/**
* This is the data class for [[common\models\database\Menu]].
*
* @see \common\models\database\Menu
*/
class Menu extends \common\models\database\Menu
{
        
    const MENU_APP_TYPE_BACKEND = 0;
    const MENU_APP_TYPE_FRONTEND = 1;
    /**
     * @var array $app_type_code 菜单类型.0后台,1前台
     */
    public static $app_type_code = [0=>'backend',1=>'frontend',];
        
    const MENU_POSITION_LEFT = 0;
    const MENU_POSITION_TOP = 1;
    /**
     * @var array $position_code 位置，0左，1上
     */
    public static $position_code = [0=>'left',1=>'top',];
        
    const MENU_TARGET__SELF = 0;
    const MENU_TARGET__BLANK = 1;
    /**
     * @var array $target_code 打开方式._blank新窗口,_self本窗口
     */
    public static $target_code = [0=>'_self',1=>'_blank',];
        
    const MENU_IS_DISPLAY_NO = 0;
    const MENU_IS_DISPLAY_YES = 1;
    /**
     * @var array $is_display_code 是否显示.0否,1是
     */
    public static $is_display_code = [0=>'no',1=>'yes',];
        
    const MENU_IS_ABSOLUTE_URL_NO = 0;
    const MENU_IS_ABSOLUTE_URL_YES = 1;
    /**
     * @var array $is_absolute_url_code 是否绝对地址
     */
    public static $is_absolute_url_code = [0=>'no',1=>'yes',];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[

        ]);
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
