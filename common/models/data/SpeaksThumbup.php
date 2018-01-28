<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%speaks_thumbup}}".
 *
 */
class SpeaksThumbup extends \common\models\database\SpeaksThumbup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['speaks_id', 'user_id', 'add_time'], 'integer'],
        ];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['add_time'],
                ],
            ],
        ];
    }
}
