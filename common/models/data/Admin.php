<?php
namespace common\models\data;

use Yii;

/**
* This is the data class for [[common\models\database\Admin]].
*
* @see \common\models\database\Admin
*/
class Admin extends \common\models\database\Admin
{

    const ADMIN_STATUS_DELETE = 0;
    const ADMIN_STATUS_FROZEN = 1;
    const ADMIN_STATUS_AUDIT_FAILED = 2;
    const ADMIN_STATUS_LIMIT_LOGIN = 3;
    const ADMIN_STATUS_LIMIT_ACTIVE = 4;
    const ADMIN_STATUS_LOGIN_ERROR = 5;
    const ADMIN_STATUS_ACTIVE_ERROR = 6;
    const ADMIN_STATUS_ACTIVE = 10;
    /**
     * @var array $status_code 状态
     */
    public static $status_code = [0=>'Delete',1=>'Frozen',2=>'Audit Failed',3=>'Limit Login',4=>'Limit Active',5=>'Login Error',6=>'Active Error',10=>'Active',];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['status'], 'in', 'range' => [0,1,2,3,4,5,6,10,],],
            [['role_id'], 'default', 'value' =>10,],
        ]);
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        return [
            'default' => [
                'name',
                'head',
                'email',
                'mobile',
                'status',
                'auth_key',
                'password',
                'password_reset_token',
                'role_id',
            ],
            'search' => [
                'id',
                'name',
                'head',
                'email',
                'mobile',
                'status',
                'auth_key',
                'password',
                'password_reset_token',
                'role_id',
                'add_time',
                'edit_time',
            ],
            'frontend' => [
                'id',
                'name',
                'head',
                'email',
                'mobile',
                'status',
                'auth_key',
                'password',
                'password_reset_token',
                'role_id',
                'add_time',
                'edit_time',
            ],
            'info' => [
                'head',
                'email',
                'mobile',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(),[

        ]);
    }

    public function behaviors()
    {
        return [
            'timeUpdate'=>[
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['add_time'],
                    self::EVENT_BEFORE_UPDATE => ['edit_time'],
                ],
            ],
            'getStatusCode'=>[
                'class' => \common\components\behaviors\StatusCode::className(),
            ],
        ];
    }
}
