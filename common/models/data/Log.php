<?php
namespace common\models\data;

use Yii;

/**
* This is the data class for [[common\models\database\Log]].
*
* @see \common\models\database\Log
*/
class Log extends \common\models\database\Log
{

    const LOG_LEVEL_ALL = 0;
    const LOG_LEVEL_ERROR = 1;
    const LOG_LEVEL_WARNING = 2;
    const LOG_LEVEL_INFO = 4;
    const LOG_LEVEL_TRACING = 8;
    const LOG_LEVEL_PROFILE = 32;
    const LOG_LEVEL_PROFILE_BEGIN = 40;
    const LOG_LEVEL_PROFILE_END = 48;
    /**
     * @var array $level_code 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
     */
    public static $level_code = [0=>'All',1=>'Error',2=>'Warning',4=>'info',8=>'tracing',32=>'Profile',40=>'Profile Begin',48=>'Profile End',];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['level'], 'in', 'range' => [0,1,2,4,8,32,40,48,],],
        ]);
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        return [
            'default' => [
                'level',
                'category',
                'prefix',
                'message',
            ],
            'search' => [
                'id',
                'level',
                'category',
                'log_time',
                'prefix',
                'message',
            ],
            'frontend' => [
                'id',
                'level',
                'category',
                'log_time',
                'prefix',
                'message',
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
                ],
            ],
            'getStatusCode'=>[
                'class' => \common\components\behaviors\StatusCode::className(),
            ],
        ];
    }
}
