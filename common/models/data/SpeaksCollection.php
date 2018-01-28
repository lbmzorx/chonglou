<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%speaks_collection}}".
 *
 */
class SpeaksCollection extends \common\models\database\SpeaksCollection
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
