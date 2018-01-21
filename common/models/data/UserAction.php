<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%user_action}}".
 *
 * @property string $id
 * @property string $user_id
 * @property string $action 动作内容
 * @property string $action_id 动作ID
 * @property int $action_type 动作类型
 * @property int $status 状态，0未读，1已读，2未知
 * @property string $add_time 添加时间
 */
class UserAction extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_action}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'action_id', 'action_type', 'status', 'add_time'], 'integer'],
            [['action'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'action' => Yii::t('app', '动作内容'),
            'action_id' => Yii::t('app', '动作ID'),
            'action_type' => Yii::t('app', '动作类型'),
            'status' => Yii::t('app', '状态，0未读，1已读，2未知'),
            'add_time' => Yii::t('app', '添加时间'),
        ];
    }
}
