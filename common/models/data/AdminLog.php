<?php
namespace common\models\data;

use Yii;

/**
* This is the data class for [[common\models\database\AdminLog]].
*
* @see \common\models\database\AdminLog
*/
class AdminLog extends \common\models\database\AdminLog
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['route'], 'default', 'value' =>'',],
            [['edit_time'], 'default', 'value' =>'0',],
        ]);
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        return [
            'default' => [
                'user_id',
                'route',
                'description',
            ],
            'search' => [
                'id',
                'user_id',
                'route',
                'description',
                'add_time',
                'edit_time',
            ],
            'frontend' => [
                'id',
                'user_id',
                'route',
                'description',
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
        'withOneUser'=>[
                'class' => \common\components\behaviors\WithOneUser::className(),
            ],
        ];
    }
}
