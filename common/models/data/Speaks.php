<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%speaks}}".
 *
 */
class Speaks extends \common\models\database\Speaks
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'commit', 'view', 'thumbup', 'status', 'add_time'], 'integer'],
            [['content'], 'string'],
            [['user_id'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
