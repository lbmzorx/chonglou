<?php
namespace common\models\data;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
* This is the data class for [[common\models\database\AdminInfo]].
*
* @see \common\models\database\AdminInfo
*/
class AdminInfo extends \common\models\database\AdminInfo
{

    const ADMININFO_STATUS_UNREAL_NAME = 0;
    const ADMININFO_STATUS_REAL_NAME = 1;
    /**
     * @var array $status_code 状态.0未实名,1已实名
     */
    public static $status_code = [0=>'Unreal Name',1=>'Real Name',];

    const ADMININFO_SEX_FEMALE = 0;
    const ADMININFO_SEX_MALE = 1;
    /**
     * @var array $sex_code 性别.0女,1男
     */
    public static $sex_code = [0=>'Female',1=>'male',];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['status'], 'in', 'range' => [0,1,],],
            [['sex'], 'in', 'range' => [0,1,],],
            [['real_name'], 'default', 'value' =>'',],
            [['sex'], 'default', 'value' =>1,],
            [['birthday'], 'default', 'value' =>'',],
            [['province'], 'default', 'value' =>'',],
            [['city'], 'default', 'value' =>'',],
            [['county'], 'default', 'value' =>'',],
            [['address'], 'default', 'value' =>'',],
            [['identified_card'], 'default', 'value' =>'',],
            [['status'], 'default', 'value' =>0,],
            [['qq'], 'default', 'value' =>'',],
            [['wechat'], 'default', 'value' =>'0',],
            [['weibo'], 'default', 'value' =>'0',],
            [['other_mongodb'], 'default', 'value' =>'0',],
            [['add_time'], 'default', 'value' =>0,],
            [['edit_time'], 'default', 'value' =>0,],
        ]);
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        return [
            'default' => [
                'admin_id',
                'real_name',
                'sex',
                'birthday',
                'province',
                'city',
                'county',
                'address',
                'identified_card',
                'status',
                'qq',
                'wechat',
                'weibo',
                'other_mongodb',
            ],
            'search' => [
                'id',
                'admin_id',
                'real_name',
                'sex',
                'birthday',
                'province',
                'city',
                'county',
                'address',
                'identified_card',
                'status',
                'qq',
                'wechat',
                'weibo',
                'other_mongodb',
                'add_time',
                'edit_time',
            ],
            'frontend' => [
                'id',
                'admin_id',
                'real_name',
                'sex',
                'birthday',
                'province',
                'city',
                'county',
                'address',
                'identified_card',
                'status',
                'qq',
                'wechat',
                'weibo',
                'other_mongodb',
                'add_time',
                'edit_time',
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
            'admin_id'=>[
                'class'=>AttributeBehavior::className(),
                'attribute'=>[
                    ActiveRecord::EVENT_BEFORE_VALIDATE=>['admin_id'],
                ],
                'value'=>\yii::$app->user->id,
            ],
        ];
    }

    public function getAdmin(){
        return $this->hasOne(Admin::className(),['admin_id'=>'id']);
    }

}
