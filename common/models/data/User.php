<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property string $id
 * @property string $name
 * @property string $nick
 * @property string $email
 * @property string $mobile
 * @property integer $status
 * @property string $auth_key
 * @property string $password
 * @property string $password_reset_token
 * @property integer $role_id
 * @property integer $add_time
 * @property integer $edit_time
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'role_id', 'add_time', 'edit_time'], 'integer'],
            [['name', 'nick'], 'string', 'max' => 50],
            [['email', 'mobile'], 'string', 'max' => 20],
            [['auth_key', 'password', 'password_reset_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'nick' => '昵称',
            'email' => '邮箱',
            'mobile' => '手机号',
            'status' => '状态',
            'auth_key' => '授权登录',
            'password' => '密码',
            'password_reset_token' => '密码重置口令',
            'role_id' => '角色',
            'add_time' => 'Add Time',
            'edit_time' => 'Edit Time',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['add_time'],
                    self::EVENT_BEFORE_UPDATE => ['edit_time'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }
}
