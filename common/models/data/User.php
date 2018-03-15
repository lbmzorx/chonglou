<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 */
class User extends \common\models\database\User
{
    const STATUS_DELETE     =   0; //删除账号
    const STATUS_FROOZE     =   1; //冻结
    const STATUS_AUDITFAILED=   2; //未通过审核
    const STATUS_LIMITLOGIN =   3; //限制登录
    const STATUS_LIMITACTIVE=   4; //限制活动
    const STATUS_LOGINERROR =   5; //登录异常
    const STATUS_ACTIVEERROR=   6; //活动异常
    const STATUS_UNACTIVE   =   9; //账号未激活
    const STATUS_ACTIVE     =   10; //正常

    public static $status_code=[0=>'删除',1=>'冻结',2=>'未通过审核',3=>'限制登录',4=>'限制活动',5=>'登录异常',6=>'活动异常',9=>'未激活',10=>'正常',];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules=[

        ];
        return \yii\helpers\ArrayHelper::merge(parent::rules(),$rules);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $lables= [

        ];
        return \yii\helpers\ArrayHelper::merge(parent::attributeLabels(),$lables);
    }


    public function behaviors()
    {
        return [
            'activeTime'=>[
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['add_time'],
                    self::EVENT_BEFORE_UPDATE => ['edit_time'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                // 'value' => new Expression('NOW()'),
            ],
            'getStatusCode'=>[
                'class' => \common\components\behaviors\StatusCode::className(),
            ],
        ];
    }
}
