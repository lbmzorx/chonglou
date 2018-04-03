<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%admin_message}}".
 *
 * @property string $id
 * @property string $to_admin_id 收信管理员
 * @property string $from_admin_id 发信管理员
 * @property int $spread_type 消息类型.0=广播,1组,3私信
 * @property int $level 级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星
 * @property string $name 消息名
 * @property string $content 内容
 * @property int $read 已读.0未读,1已读
 * @property int $from_type 来源类型.0管理员,1用户,2路人,10操作系统,11其他
 * @property int $add_time 添加时间
 */
class AdminMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_message}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['to_admin_id', 'from_admin_id', 'spread_type', 'level', 'read', 'from_type', 'add_time'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['content'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'), //
            'to_admin_id' => Yii::t('model', 'To Admin ID'), //收信管理员
            'from_admin_id' => Yii::t('model', 'From Admin ID'), //发信管理员
            'spread_type' => Yii::t('model', 'Spread Type'), //消息类型.0=广播,1组,3私信
            'level' => Yii::t('model', 'Level'), //级别.0一般,1=1星,2=2星,3=3星,4=4星,5=5星
            'name' => Yii::t('model', 'Name'), //消息名
            'content' => Yii::t('model', 'Content'), //内容
            'read' => Yii::t('model', 'Read'), //已读.0未读,1已读
            'from_type' => Yii::t('model', 'From Type'), //来源类型.0管理员,1用户,2路人,10操作系统,11其他
            'add_time' => Yii::t('model', 'Add Time'), //添加时间
        ];
    }
}


