<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%topic_thumbup}}".
 *
 */
class TopicThumbup extends \common\models\database\TopicThumbup
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['topic_id', 'user_id', 'add_time'], 'integer'],
        ];
    }


}
