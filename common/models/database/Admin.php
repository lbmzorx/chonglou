<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property string $id
 * @property string $name 名称
 * @property string $head 头像
 * @property string $email 邮箱
 * @property string $mobile 手机号
 * @property int $status 状态
 * @property string $auth_key 授权登录
 * @property string $password 密码
 * @property string $password_reset_token 密码重置口令
 * @property int $role_id 角色
 * @property int $add_time 添加时间
 * @property int $edit_time 修改时间
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'head', 'email', 'mobile', 'status', 'auth_key', 'password', 'password_reset_token', 'add_time', 'edit_time'], 'required'],
            [['status', 'role_id', 'add_time', 'edit_time'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['head', 'auth_key', 'password', 'password_reset_token'], 'string', 'max' => 255],
            [['email', 'mobile'], 'string', 'max' => 20],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'), //
            'name' => Yii::t('model', 'Name'), //名称
            'head' => Yii::t('model', 'Head'), //头像
            'email' => Yii::t('model', 'Email'), //邮箱
            'mobile' => Yii::t('model', 'Mobile'), //手机号
            'status' => Yii::t('model', 'Status'), //状态
            'auth_key' => Yii::t('model', 'Auth Key'), //授权登录
            'password' => Yii::t('model', 'Password'), //密码
            'password_reset_token' => Yii::t('model', 'Password Reset Token'), //密码重置口令
            'role_id' => Yii::t('model', 'Role ID'), //角色
            'add_time' => Yii::t('model', 'Add Time'), //添加时间
            'edit_time' => Yii::t('model', 'Edit Time'), //修改时间
        ];
    }
}


