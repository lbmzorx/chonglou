<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%speaks}}".
 *
 * @property int $id
 * @property string $user_id 用户ID
 * @property string $content 说说内容
 * @property string $commit 评论
 * @property string $view 浏览
 * @property int $thumbup 点赞
 * @property int $status 状态
 * @property int $add_time 添加时间
 */
class Speaks extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%speaks}}';
    }

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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', '用户ID'),
            'content' => Yii::t('app', '说说内容'),
            'commit' => Yii::t('app', '评论'),
            'view' => Yii::t('app', '浏览'),
            'thumbup' => Yii::t('app', '点赞'),
            'status' => Yii::t('app', '状态'),
            'add_time' => Yii::t('app', '添加时间'),
        ];
    }
}
