<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%topic}}".
 *
 * @property string $id
 * @property string $user_id
 * @property int $cate_id 分类
 * @property string $title 标题
 * @property string $author 作者
 * @property string $content 内容
 * @property int $remain 提醒,0未提醒，1已经提醒
 * @property int $publish 发布,0不发布，1发布,2发布当前
 * @property int $status 状态值，0待审核,1审核通过,2正在审核,3审核不通过
 * @property string $tags 标签
 * @property string $commit 评论
 * @property string $view 浏览
 * @property string $collection 收藏
 * @property int $thumbup 点赞
 * @property int $add_time 添加时间
 * @property int $edit_time 编辑时间
 */
class Topic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%topic}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'cate_id', 'remain', 'publish', 'status', 'commit', 'view', 'collection', 'thumbup', 'add_time', 'edit_time'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['author', 'tags'], 'string', 'max' => 20],
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
            'cate_id' => Yii::t('app', '分类'),
            'title' => Yii::t('app', '标题'),
            'author' => Yii::t('app', '作者'),
            'content' => Yii::t('app', '内容'),
            'remain' => Yii::t('app', '提醒,0未提醒，1已经提醒'),
            'publish' => Yii::t('app', '发布,0不发布，1发布,2发布当前'),
            'status' => Yii::t('app', '状态值，0待审核,1审核通过,2正在审核,3审核不通过'),
            'tags' => Yii::t('app', '标签'),
            'commit' => Yii::t('app', '评论'),
            'view' => Yii::t('app', '浏览'),
            'collection' => Yii::t('app', '收藏'),
            'thumbup' => Yii::t('app', '点赞'),
            'add_time' => Yii::t('app', '添加时间'),
            'edit_time' => Yii::t('app', '编辑时间'),
        ];
    }
}
