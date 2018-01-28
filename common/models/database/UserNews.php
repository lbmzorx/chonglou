<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%user_news}}".
 *
 * @property string $id
 * @property string $user_id
 * @property int $news_count 通知数量
 */
class UserNews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'news_count'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'news_count' => Yii::t('app', '通知数量'),
        ];
    }
}
