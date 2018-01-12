<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%article}}".
 *
 * @property string $id
 * @property integer $cate_id
 * @property string $title
 * @property string $author
 * @property string $cover
 * @property string $tags
 * @property string $abstract
 * @property integer $add_admin_id
 * @property string $content
 * @property integer $remain
 * @property integer $publish
 * @property integer $status
 * @property integer $add_time
 * @property integer $edit_time
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
            [['cate_id', 'add_admin_id', 'remain', 'publish', 'status', 'add_time', 'edit_time'], 'integer'],
            [['content'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['author','tags'], 'string', 'max' => 20],
            [['cover', 'abstract'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cate_id' => '分类',
            'title' => '标题',
            'author' => '作者',
            'cover' => '封面',
            'abstract' => '摘要',
            'add_admin_id' => '添加者',
            'tags' => '标签',
            'content' => '内容',
            'remain' => '提醒',//,0未提醒，1已经提醒
            'publish' => '发布', //,0不发布，1发布,2发布当前
            'status' => '状态',  //值，0待审核,1审核通过,2正在审核,3审核不通过
            'add_time' => '添加时间',
            'edit_time' => '编辑时间',
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
