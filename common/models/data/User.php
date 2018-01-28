<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 */
class User extends \yii\db\ActiveRecord
{

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
