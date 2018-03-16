<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%article_content}}".
 *
 * @property string $id
 * @property string $content 文章内容
 */
class ArticleContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_content}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'), //
            'content' => Yii::t('model', 'Content'), //文章内容
        ];
    }
}


