<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%user_message}}".
 *
 */
class UserMessage extends \common\models\database\UserMessage
{

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
}
