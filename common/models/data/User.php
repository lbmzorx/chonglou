<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property string $id
 * @property string $name 名称
 * @property string $nick 昵称
 * @property string $email 邮箱
 * @property string $mobile 手机号
 * @property int $status 状态
 * @property string $auth_key 授权登录
 * @property string $password 密码
 * @property string $password_reset_token 密码重置口令
 * @property int $role_id 角色
 * @property int $add_time
 * @property int $edit_time
 * @property string $head
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
            [['auth_key', 'password', 'password_reset_token', 'head'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', '名称'),
            'nick' => Yii::t('app', '昵称'),
            'email' => Yii::t('app', '邮箱'),
            'mobile' => Yii::t('app', '手机号'),
            'status' => Yii::t('app', '状态'),
            'auth_key' => Yii::t('app', '授权登录'),
            'password' => Yii::t('app', '密码'),
            'password_reset_token' => Yii::t('app', '密码重置口令'),
            'role_id' => Yii::t('app', '角色'),
            'add_time' => Yii::t('app', 'Add Time'),
            'edit_time' => Yii::t('app', 'Edit Time'),
            'head' => Yii::t('app', 'Head'),
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
