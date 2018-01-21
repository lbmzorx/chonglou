<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%article_thumbup}}".
 *
 * @property string $id
 * @property string $article_id 文章ID
 * @property string $user_id 用户ID
 * @property string $add_time 添加时间
 */
class ArticleThumbup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_thumbup}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'user_id', 'add_time'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'article_id' => Yii::t('app', '文章ID'),
            'user_id' => Yii::t('app', '用户ID'),
            'add_time' => Yii::t('app', '添加时间'),
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
