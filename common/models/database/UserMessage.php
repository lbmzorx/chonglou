<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "{{%user_message}}".
 *
 * @property string $id
 * @property string $content 消息内容
 * @property string $send_id 发送者ID
 * @property string $to_id 接收者ID
 * @property int $status 状态
 * @property string $add_time 添加时间
 */
class UserMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_message}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['send_id', 'to_id', 'status', 'add_time'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'content' => Yii::t('app', '消息内容'),
            'send_id' => Yii::t('app', '发送者ID'),
            'to_id' => Yii::t('app', '接收者ID'),
            'status' => Yii::t('app', '状态'),
            'add_time' => Yii::t('app', '添加时间'),
        ];
    }
}
