<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%admin_info}}".
 *
 * @property string $id
 * @property int $admin_id 管理员ID
 * @property string $real_name 实名
 * @property int $sex 性别.0女,1男
 * @property string $birthday 生日
 * @property string $province 省
 * @property string $city 市
 * @property string $county 县/区
 * @property string $address 详细地址
 * @property string $identified_card 身份证
 * @property int $status 状态.0未实名,1已实名
 * @property string $qq QQ
 * @property string $wechat 微信
 * @property string $weibo 微博
 * @property string $other_mongodb 其他信息
 * @property int $add_time 添加时间
 * @property int $edit_time 修改时间
 */
class AdminInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_id'], 'required'],
            [['admin_id', 'sex', 'status', 'add_time', 'edit_time'], 'integer'],
            [['real_name'], 'string', 'max' => 50],
            [['birthday', 'province', 'city', 'county', 'wechat', 'weibo'], 'string', 'max' => 20],
            [['address', 'other_mongodb'], 'string', 'max' => 255],
            [['identified_card'], 'string', 'max' => 18],
            [['qq'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'), //
            'admin_id' => Yii::t('model', 'Admin ID'), //管理员ID
            'real_name' => Yii::t('model', 'Real Name'), //实名
            'sex' => Yii::t('model', 'Sex'), //性别.0女,1男
            'birthday' => Yii::t('model', 'Birthday'), //生日
            'province' => Yii::t('model', 'Province'), //省
            'city' => Yii::t('model', 'City'), //市
            'county' => Yii::t('model', 'County'), //县/区
            'address' => Yii::t('model', 'Address'), //详细地址
            'identified_card' => Yii::t('model', 'Identified Card'), //身份证
            'status' => Yii::t('model', 'Status'), //状态.0未实名,1已实名
            'qq' => Yii::t('model', 'Qq'), //QQ
            'wechat' => Yii::t('model', 'Wechat'), //微信
            'weibo' => Yii::t('model', 'Weibo'), //微博
            'other_mongodb' => Yii::t('model', 'Other Mongodb'), //其他信息
            'add_time' => Yii::t('model', 'Add Time'), //添加时间
            'edit_time' => Yii::t('model', 'Edit Time'), //修改时间
        ];
    }
}


