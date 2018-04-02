<?php

namespace common\models\data;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%admin}}".
 *
 */
class Admin extends \common\models\database\Admin
{

    const ADMIN_STATUS_DELETE     =   0; //删除账号
    const ADMIN_STATUS_FROOZE     =   1; //冻结
    const ADMIN_STATUS_AUDITFAILED=   2; //未通过审核
    const ADMIN_STATUS_LIMITLOGIN =   3; //限制登录
    const ADMIN_STATUS_LIMITACTIVE=   4; //限制活动
    const ADMIN_STATUS_LOGINERROR =   5; //登录异常
    const ADMIN_STATUS_ACTIVEERROR=   6; //活动异常
    const ADMIN_STATUS_ACTIVE     =   10; //正常

    public static $status_code=[0=>'删除',1=>'冻结',2=>'限制登录',3=>'未通过审核',4=>'限制活动',5=>'登录异常',6=>'活动异常',10=>'正常',];

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
                'class' => TimestampBehavior::className(),
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
