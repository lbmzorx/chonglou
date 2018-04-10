<?php
namespace common\models\data;

use Yii;
use yii\caching\TagDependency;

/**
* This is the data class for [[common\models\database\AdminMessage]].
*
* @see \common\models\database\AdminMessage
*/
class AdminMessage extends \common\models\database\AdminMessage
{
    const TAGS='admin.message.data.models.common';

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
    const ADMINMESSAGE_LEVEL_DANGER = 3;
    const ADMINMESSAGE_LEVEL_IMPORTANT = 4;
    const ADMINMESSAGE_LEVEL_EMERGENCY = 5;
    /**
     * @var array $level_code 级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星
     */
    public static $level_code = [0=>'Normal',1=>'Info',2=>'Warning',3=>'Danger',4=>'Important',5=>'Emergency',];

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
                    self::EVENT_BEFORE_INSERT => ['add_time'],
                ],
            ],
            'getStatusCode'=>[
                'class' => \common\components\behaviors\StatusCode::className(),
            ],
        ];
    }

    public static function getAdminMessage($admin_id){
        $key=['admin'=>$admin_id,'class'=>AdminMessage::className()];
        $cache=\yii::$app->cache;
        $msg=$cache->get($key);
        if( $msg==false ){
            $query=self::find()->select('a.id,a.name,a.level')->alias('a')
                ->leftJoin('{{%admin_message_log}} l',['l.admin_message_id'=>'a.id'])
                ->where(['and',
                    ['spread_type'=>[self::ADMINMESSAGE_SPREAD_TYPE_GROUP,self::ADMINMESSAGE_SPREAD_TYPE_BROADCAST]],
                    ['not in','l.admin_id',$admin_id,]
                ])
                ->orWhere([
                    'spread_type'=>self::ADMINMESSAGE_SPREAD_TYPE_PERSONAL,
                    'read'=>self::ADMINMESSAGE_READ_UNREAD,
                    'to_admin_id'=>$admin_id,
                ]);
            $count=$query->count();
            if($count>0){
                $msg=$query->limit(10)->orderBy(['id'=>SORT_DESC,'level'=>SORT_DESC])->asArray()->all();
            }else{
                $msg=[];
            }
            $cache->set($key,['count'=>$count,'data'=>$msg],86400*30,new TagDependency([
                'tags'=>self::TAGS,
            ]));
            return ['count'=>$count,'data'=>$msg];
        }else{
            return $msg;
        }
    }

    public static function addOneMessageCache($msg,$admin_id){
        $key=['admin'=>$admin_id,'class'=>AdminMessage::className()];
        $res=static::getAdminMessage($admin_id);
        if($res['count']>0){
            $res['count']++;
            $res['data']=array_unshift($res['data'],$msg);
            array_pop($res['data']);
        }else{
            $res=['count'=>1,'data'=>$msg];
        }
        $cache=\yii::$app->cache;
        $cache->set($key,$res,86400*30,new TagDependency([
            'tags'=>self::TAGS,
        ]));
    }

    public static function delOneMessageCache($msgid,$admin_id){
        $key=['admin'=>$admin_id,'class'=>AdminMessage::className()];
        $res=static::getAdminMessage($admin_id);
        if($res['count']>0){
            foreach ($res as $k=>$msg){
                if($msg['id']==$msgid){
                    $res['count']--;
                    unset($res['data'][$k]);
                    $cache=\yii::$app->cache;
                    $cache->set($key,$res,86400*30,new TagDependency([
                        'tags'=>self::TAGS,
                    ]));
                    break;
                }
            }
        }
    }

    public function afterSave($insert , $changedAttributes)
    {
        if($insert==true){
            if($this->spread_type==self::ADMINMESSAGE_SPREAD_TYPE_PERSONAL){
                static::addOneMessageCache([
                    'id'=>$this->id,
                    'name'=>$this->name,
                    'level'=>$this->level,
                ],$this->to_admin_id);
            }else{
                static::invalidCache();
            }
        }
        parent::afterSave($insert , $changedAttributes); // TODO: Change the autogenerated stub
    }

    public static function invalidCache(){
        TagDependency::invalidate(\yii::$app->cache,self::TAGS);
    }

}
