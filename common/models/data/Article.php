<?php
namespace common\models\data;

use common\models\database\ArticleContent;
use Yii;

/**
* This is the data class for [[common\models\database\Article]].
*
* @see \common\models\database\Article
*/
class Article extends \common\models\database\Article
{

    const ARTICLE_REMAIN_UN_REMAIN = 0;
    const ARTICLE_REMAIN_REMAINED = 1;
    /**
     * @var array $remain_code 提醒.0未提醒，1已经提醒
     */
    public static $remain_code = [0=>'Un remain',1=>'Remained',];

    const ARTICLE_AUTH_ALL_USERS = 0;
    const ARTICLE_AUTH_FRIENDS = 1;
    const ARTICLE_AUTH_ENCODE = 2;
    const ARTICLE_AUTH_PRIVATE = 3;
    /**
     * @var array $auth_code 权限.0所有人，1好友，2加密，3自己
     */
    public static $auth_code = [0=>'All users',1=>'Friends',2=>'Encode',3=>'Private',];

    const ARTICLE_PUBLISH_DRAFT = 0;
    const ARTICLE_PUBLISH_PUBLISHED = 1;
    /**
     * @var array $publish_code 发布.0草稿,1发布
     */
    public static $publish_code = [0=>'Draft',1=>'Published',];

    const ARTICLE_STATUS_WAITING_AUDIT = 0;
    const ARTICLE_STATUS_AUDIT_PASS = 1;
    const ARTICLE_STATUS_AUDITING = 2;
    const ARTICLE_STATUS_AUDIT_FAILED = 3;
    /**
     * @var array $status_code 状态值.0待审核,1审核通过,2正在审核,3审核不通过
     */
    public static $status_code = [0=>'Waiting Audit',1=>'Audit Pass',2=>'Auditing',3=>'Audit Failed',];

    const ARTICLE_LEVEL_GARBAGE = 0;
    const ARTICLE_LEVEL_NON_NUTRITIVE = 1;
    const ARTICLE_LEVEL_GENERAL = 2;
    const ARTICLE_LEVEL_BETTER = 3;
    const ARTICLE_LEVEL_GOOD = 4;
    const ARTICLE_LEVEL_GENIUS = 5;
    /**
     * @var array $level_code 文章级别.0垃圾,1较差,2普通,3较好,4优秀,5天才
     */
    public static $level_code = [0=>'Garbage',1=>'Non nutritive',2=>'General',3=>'Better',4=>'Good',5=>'Genius',];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['remain'], 'in', 'range' => [0,1,],],
            [['auth'], 'in', 'range' => [0,1,2,3,],],
            [['publish'], 'in', 'range' => [0,1,],],
            [['status'], 'in', 'range' => [0,1,2,3,],],
            [['level'], 'in', 'range' => [0,1,2,3,4,5,],],
            [['remain'], 'default', 'value' =>0,],
            [['auth'], 'default', 'value' =>0,],
            [['commit'], 'default', 'value' =>'0',],
            [['view'], 'default', 'value' =>'0',],
            [['collection'], 'default', 'value' =>'0',],
            [['thumbup'], 'default', 'value' =>0,],
            [['level'], 'default', 'value' =>2,],
            [['score'], 'default', 'value' =>0,],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ]);
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        return [
            'default' => [
                'user_id',
                'cate_id',
                'sort',
                'title',
                'author',
                'cover',
                'abstract',
                'content_id',
                'remain',
                'auth',
                'tag',
                'commit',
                'view',
                'collection',
                'thumbup',
                'level',
                'score',
                'publish',
                'status',
            ],
            'search' => [
                'id',
                'user_id',
                'cate_id',
                'sort',
                'title',
                'author',
                'cover',
                'abstract',
                'content_id',
                'remain',
                'auth',
                'tag',
                'commit',
                'view',
                'collection',
                'thumbup',
                'level',
                'score',
                'publish',
                'status',
                'add_time',
                'edit_time',
            ],
            'frontend' => [
                'id',
                'user_id',
                'cate_id',
                'sort',
                'title',
                'author',
                'cover',
                'abstract',
                'content_id',
                'remain',
                'auth',
                'tag',
                'commit',
                'view',
                'collection',
                'thumbup',
                'level',
                'score',
                'publish',
                'status',
                'add_time',
                'edit_time',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(),[

        ]);
    }

    public function behaviors()
    {
        return [
            'timeUpdate'=>[
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['add_time'],
                    self::EVENT_BEFORE_UPDATE => ['edit_time'],
                ],
            ],
            'getStatusCode'=>[
                'class' => \common\components\behaviors\StatusCode::className(),
            ],
            'withOneUser'=>[
                'class' => \common\components\behaviors\WithOneUser::className(),
            ],
        ];
    }

    public function getCate(){
        return $this->hasOne(ArticleCate::className(),['id'=>'cate_id'])->select('id,name')->asArray();
    }
}
