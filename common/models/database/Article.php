<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property string $id
 * @property int $user_id 添加者
 * @property int $cate_id 分类
 * @property int $sort 排序
 * @property string $title 标题
 * @property string $author 作者
 * @property string $cover 封面
 * @property string $abstract 摘要
 * @property string $content_id 文章内容
 * @property int $remain 提醒,0未提醒，1已经提醒
 * @property int $auth 权限,0所有人，1好友，2加密，3自己
 * @property string $tags 标签
 * @property string $commit 评论
 * @property string $view 浏览
 * @property string $collection 收藏
 * @property int $thumbup 赞
 * @property int $publish 发布,0不发布，1发布,2发布当前
 * @property int $status 状态值，0待审核,1审核通过,2正在审核,3审核不通过
 * @property int $add_time 添加时间
 * @property int $edit_time 编辑时间
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%article}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'cate_id', 'sort', 'content_id', 'remain', 'auth', 'commit', 'view', 'collection', 'thumbup', 'publish', 'status', 'add_time', 'edit_time'], 'integer'],
            [['content_id'], 'required'],
            [['title'], 'string', 'max' => 50],
            [['author', 'cover', 'abstract'], 'string', 'max' => 255],
            [['tags'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', '添加者'),
            'cate_id' => Yii::t('app', '分类'),
            'sort' => Yii::t('app', '排序'),
            'title' => Yii::t('app', '标题'),
            'author' => Yii::t('app', '作者'),
            'cover' => Yii::t('app', '封面'),
            'abstract' => Yii::t('app', '摘要'),
            'content_id' => Yii::t('app', '文章内容'),
            'remain' => Yii::t('app', '提醒,0未提醒，1已经提醒'),
            'auth' => Yii::t('app', '权限,0所有人，1好友，2加密，3自己'),
            'tags' => Yii::t('app', '标签'),
            'commit' => Yii::t('app', '评论'),
            'view' => Yii::t('app', '浏览'),
            'collection' => Yii::t('app', '收藏'),
            'thumbup' => Yii::t('app', '赞'),
            'publish' => Yii::t('app', '发布,0不发布，1发布,2发布当前'),
            'status' => Yii::t('app', '状态值，0待审核,1审核通过,2正在审核,3审核不通过'),
            'add_time' => Yii::t('app', '添加时间'),
            'edit_time' => Yii::t('app', '编辑时间'),
        ];
    }
}
