<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%article_collection}}".
 *
 */
class ArticleCollection extends \common\models\database\ArticleCollection
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules=[

        ];
        return array_merge($rules,parent::rules());
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
