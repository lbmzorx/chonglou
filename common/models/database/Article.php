<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property string $id
 * @property int $user_id 用户ID
 * @property int $cate_id 分类
 * @property int $sort 排序
 * @property string $title 标题
 * @property string $author 作者
 * @property string $cover 封面
 * @property string $abstract 摘要
 * @property string $content_id 文章内容
 * @property int $remain 提醒.0未提醒，1已经提醒
 * @property int $auth 权限.0所有人，1好友，2加密，3自己
 * @property string $tag 标签
 * @property string $commit 评论
 * @property string $view 浏览
 * @property string $collection 收藏
 * @property int $thumbup 赞
 * @property int $level 文章级别.0垃圾,1较差,2普通,3较好,4优秀,5天才
 * @property int $score 评分
 * @property int $publish 发布.0草稿,1发布
 * @property int $status 状态值.0待审核,1审核通过,2正在审核,3审核不通过
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
            [['user_id', 'cate_id', 'sort', 'content_id', 'remain', 'auth', 'commit', 'view', 'collection', 'thumbup', 'level', 'score', 'publish', 'status', 'add_time', 'edit_time'], 'integer'],
            [['content_id'], 'required'],
            [['title'], 'string', 'max' => 50],
            [['author', 'cover', 'abstract'], 'string', 'max' => 255],
            [['tag'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'), //
            'user_id' => Yii::t('model', 'User ID'), //用户ID
            'cate_id' => Yii::t('model', 'Cate ID'), //分类
            'sort' => Yii::t('model', 'Sort'), //排序
            'title' => Yii::t('model', 'Title'), //标题
            'author' => Yii::t('model', 'Author'), //作者
            'cover' => Yii::t('model', 'Cover'), //封面
            'abstract' => Yii::t('model', 'Abstract'), //摘要
            'content_id' => Yii::t('model', 'Content ID'), //文章内容
            'remain' => Yii::t('model', 'Remain'), //提醒.0未提醒，1已经提醒
            'auth' => Yii::t('model', 'Auth'), //权限.0所有人，1好友，2加密，3自己
            'tag' => Yii::t('model', 'Tag ID'), //标签
            'commit' => Yii::t('model', 'Commit'), //评论
            'view' => Yii::t('model', 'View'), //浏览
            'collection' => Yii::t('model', 'Collection'), //收藏
            'thumbup' => Yii::t('model', 'Thumbup'), //赞
            'level' => Yii::t('model', 'Level'), //文章级别.0垃圾,1较差,2普通,3较好,4优秀,5天才
            'score' => Yii::t('model', 'Score'), //评分
            'publish' => Yii::t('model', 'Publish'), //发布.0草稿,1发布
            'status' => Yii::t('model', 'Status'), //状态值.0待审核,1审核通过,2正在审核,3审核不通过
            'add_time' => Yii::t('model', 'Add Time'), //添加时间
            'edit_time' => Yii::t('model', 'Edit Time'), //编辑时间
        ];
    }
}


