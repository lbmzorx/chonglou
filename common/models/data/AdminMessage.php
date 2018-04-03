<?php
namespace common\models\data;

use Yii;

/**
* This is the data class for [[common\models\database\AdminMessage]].
*
* @see \common\models\database\AdminMessage
*/
class AdminMessage extends \common\models\database\AdminMessage
{

    const ADMINMESSAGE_SPREAD_TYPE_BROADCAST = 0;
    const ADMINMESSAGE_SPREAD_TYPE_GROUP = 1;
    const ADMINMESSAGE_SPREAD_TYPE_PERSONAL = 2;
    /**
     * @var array $spread_type_code 消息类型.0=广播,1组,3私信
     */
    public static $spread_type_code = [0=>'Broadcast',1=>'Group',2=>'Personal',];

    const ADMINMESSAGE_LEVEL_NORMAL = 0;
    const ADMINMESSAGE_LEVEL_INFO = 1;
    const ADMINMESSAGE_LEVEL_WARNING = 2;
    const ADMINMESSAGE_LEVEL_IMPORTANT = 3;
    const ADMINMESSAGE_LEVEL_EMERGENCY = 4;
    const ADMINMESSAGE_LEVEL_DANGER = 5;
    /**
     * @var array $level_code 级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星
     */
    public static $level_code = [0=>'Normal',1=>'Info',2=>'Warning',3=>'Important',4=>'Emergency',5=>'Danger',];

    const ADMINMESSAGE_READ_UNREAD = 0;
    const ADMINMESSAGE_READ_READ = 1;
    /**
     * @var array $read_code 已读.0未读,1已读
     */
    public static $read_code = [0=>'Unread',1=>'Read',];

    const ADMINMESSAGE_FROM_TYPE_ADMINISTRATOR = 0;
    const ADMINMESSAGE_FROM_TYPE_USER = 1;
    const ADMINMESSAGE_FROM_TYPE_GUEST = 2;
    const ADMINMESSAGE_FROM_TYPE_OPERATION_SYSTEM = 10;
    const ADMINMESSAGE_FROM_TYPE_OTHER = 100;
    /**
     * @var array $from_type_code 来源类型.0管理员,1用户,2路人,10操作系统,11其他
     */
    public static $from_type_code = [0=>'Administrator',1=>'User',2=>'Guest',10=>'Operation System',100=>'Other',];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['spread_type'], 'in', 'range' => [0,1,2,],],
            [['level'], 'in', 'range' => [0,1,2,3,4,5,],],
            [['read'], 'in', 'range' => [0,1,],],
            [['from_type'], 'in', 'range' => [0,1,2,10,100,],],
            [['to_admin_id'], 'default', 'value' =>'0',],
            [['from_admin_id'], 'default', 'value' =>'0',],
            [['spread_type'], 'default', 'value' =>3,],
            [['level'], 'default', 'value' =>0,],
            [['name'], 'default', 'value' =>'0',],
            [['content'], 'default', 'value' =>'0',],
            [['read'], 'default', 'value' =>0,],
            [['from_type'], 'default', 'value' =>0,],
            [['add_time'], 'default', 'value' =>0,],
        ]);
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        return [
            'default' => [
                'to_admin_id',
                'from_admin_id',
                'spread_type',
                'level',
                'name',
                'content',
                'read',
                'from_type',
            ],
            'search' => [
                'id',
                'to_admin_id',
                'from_admin_id',
                'spread_type',
                'level',
                'name',
                'content',
                'read',
                'from_type',
                'add_time',
            ],
            'frontend' => [
                'id',
                'to_admin_id',
                'from_admin_id',
                'spread_type',
                'level',
                'name',
                'content',
                'read',
                'from_type',
                'add_time',
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
