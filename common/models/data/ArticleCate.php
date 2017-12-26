<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%article_cate}}".
 *
 * @property string $id
 * @property string $name
 * @property integer $parent_id
 * @property integer $level
 * @property string $path
 * @property integer $add_time
 * @property integer $edit_time
 */
class ArticleCate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article_cate}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'level', 'add_time', 'edit_time'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', '名称'),
            'parent_id' => Yii::t('app', '父级分类'),
            'level' => Yii::t('app', '级别'),
            'path' => Yii::t('app', '路径'),
            'add_time' => Yii::t('app', '添加时间'),
            'edit_time' => Yii::t('app', '编辑时间'),
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['add_time'],
                    self::EVENT_BEFORE_UPDATE => ['edit_time'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }
}
