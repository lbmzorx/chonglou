<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%article_cate}}".
 *
 * @property string $id
 * @property string $name 名称
 * @property int $parent_id 父级分类
 * @property int $level 级别
 * @property string $path 路径
 * @property int $status 状态
 * @property int $add_time 添加时间
 * @property int $edit_time 编辑时间
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
            [['parent_id', 'level', 'status', 'add_time', 'edit_time'], 'integer'],
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
            'status' => Yii::t('app', '状态'),
            'add_time' => Yii::t('app', '添加时间'),
            'edit_time' => Yii::t('app', '编辑时间'),
        ];
    }
}
