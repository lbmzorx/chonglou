<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%topic_collection}}".
 *
 */
class TopicCollection extends \common\models\database\TopicCollection
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
