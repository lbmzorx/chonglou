<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property string $id
 * @property int $cate_id 分类
 * @property string $title 标题
 * @property string $author 作者
 * @property string $cover 封面
 * @property string $abstract 摘要
 * @property string $content 内容
 * @property int $remain 提醒,0未提醒，1已经提醒
 * @property int $publish 发布,0不发布，1发布,2发布当前
 * @property int $status 状态值，0待审核,1审核通过,2正在审核,3审核不通过
 * @property int $add_time 添加时间
 * @property int $edit_time 编辑时间
 * @property string $tags 标签
 * @property string $commit 评论
 * @property string $view 浏览
 * @property string $collection 收藏
 * @property int $thumbup 赞
 */
class Article extends \yii\db\ActiveRecord
{
    public static $publish_code=[0=>'未发布',1=>'发布'];
    public static $status_code=[0=>'未待审核',1=>'审核通过',2=>'审核不通过'];
    public static $remain_code=[0=>'未提醒',1=>'已经提醒'];
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
            [['cate_id', 'remain', 'publish', 'status', 'add_time', 'edit_time', 'commit', 'view', 'collection', 'thumbup'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['author', 'tags'], 'string', 'max' => 255],
            [['cover', 'abstract'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cate_id' => Yii::t('app', '分类'),
            'title' => Yii::t('app', '标题'),
            'author' => Yii::t('app', '作者'),
            'cover' => Yii::t('app', '封面'),
            'abstract' => Yii::t('app', '摘要'),
            'add_admin_id' => Yii::t('app', '添加者'),
            'content' => Yii::t('app', '内容'),
            'remain' => Yii::t('app', '提醒'),//,0未提醒，1已经提醒
            'publish' => Yii::t('app', '发布'),//,0不发布，1发布,2发布当前
            'status' => Yii::t('app', '状态'),//，0待审核,1审核通过,2正在审核,3审核不通过
            'add_time' => Yii::t('app', '添加时间'),
            'edit_time' => Yii::t('app', '编辑时间'),
            'tags' => Yii::t('app', '标签'),
            'commit' => Yii::t('app', '评论'),
            'view' => Yii::t('app', '浏览'),
            'collection' => Yii::t('app', '收藏'),
            'thumbup' => Yii::t('app', '赞'),
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
            ],
            'getStatusCode'=>[
                'class' => \common\component\StatusCode::className(),
            ],
        ];
    }

    public function getCateName(){
        return $this->hasOne(ArticleCate::className(),['id'=>'cate_id']);
    }
}
