<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%admin_log}}".
 *
 * @property string $id 自增id
 * @property string $user_id 管理员用户id
 * @property string $route 操作路由
 * @property string $description 操作描述
 * @property string $add_time 添加时间
 * @property string $edit_time 修改时间
 */
class AdminLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%admin_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'add_time'], 'required'],
            [['user_id', 'add_time', 'edit_time'], 'integer'],
            [['description'], 'string'],
            [['route'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'), //自增id
            'user_id' => Yii::t('model', 'User ID'), //管理员用户id
            'route' => Yii::t('model', 'Route'), //操作路由
            'description' => Yii::t('model', 'Description'), //操作描述
            'add_time' => Yii::t('model', 'Add Time'), //添加时间
            'edit_time' => Yii::t('model', 'Edit Time'), //修改时间
        ];
    }
}


