<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%article_thumbup}}".
 *
 */
class ArticleThumbup extends \common\models\database\ArticleThumbup
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'user_id', 'add_time'], 'integer'],
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
