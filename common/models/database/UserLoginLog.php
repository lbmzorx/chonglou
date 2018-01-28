<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%user_login_log}}".
 *
 * @property string $id
 * @property int $user_id 请求用户名
 * @property string $ip 请求IP
 * @property string $user_name 用户名
 * @property string $password 登录密码
 * @property int $add_time 添加时间
 */
class UserLoginLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_login_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'add_time'], 'integer'],
            [['ip'], 'string', 'max' => 129],
            [['user_name'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', '请求用户名'),
            'ip' => Yii::t('app', '请求IP'),
            'user_name' => Yii::t('app', '用户名'),
            'password' => Yii::t('app', '登录密码'),
            'add_time' => Yii::t('app', '添加时间'),
        ];
    }
}
