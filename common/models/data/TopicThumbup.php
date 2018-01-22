<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%topic_thumbup}}".
 *
 * @property string $id
 * @property string $topic_id 话题ID
 * @property string $user_id 用户ID
 * @property string $add_time 添加时间
 */
class TopicThumbup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%topic_thumbup}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['topic_id', 'user_id', 'add_time'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'topic_id' => Yii::t('app', '话题ID'),
            'user_id' => Yii::t('app', '用户ID'),
            'add_time' => Yii::t('app', '添加时间'),
        ];
    }
}
