<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%user_action}}".
 *
 */
class UserAction extends \yii\db\ActiveRecord
{

    /**
     * status code 
     * @var array
     */
    public static $status_code=[0=>'未读',1=>'已读',2=>'未知'];
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
            'status' => Yii::t('app', '状态'), //，0未读，1已读，2未知
            'add_time' => Yii::t('app', '添加时间'),
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['add_time'],
                ],
            ],
            'getStatusCode'=>[
                'class' => \common\component\StatusCode::className(),
            ],
        ];
    }
}
