<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%speaks_commit}}".
 *
 * @property string $id
 * @property string $speaks_id 说说ID
 * @property string $user_id 用户ID
 * @property string $commit_id 评论ID
 * @property string $content 评论内容
 * @property string $add_time 添加时间
 */
class SpeaksCommit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%speaks_commit}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['speaks_id', 'user_id', 'commit_id', 'add_time'], 'integer'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'speaks_id' => Yii::t('app', '说说ID'),
            'user_id' => Yii::t('app', '用户ID'),
            'commit_id' => Yii::t('app', '评论ID'),
            'content' => Yii::t('app', '评论内容'),
            'add_time' => Yii::t('app', '添加时间'),
        ];
    }
}
