<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%user_action}}".
 *
 */
class UserAction extends \common\models\database\UserAction
{

    public static $status_code=[0=>'未读',1=>'已读',2=>'未知'];

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
            'status' => Yii::t('app', '状态'), //，0未读，1已读，2未知
        ];
        return \yii\helpers\ArrayHelper::merge(parent::attributeLabels(),$lables);
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
