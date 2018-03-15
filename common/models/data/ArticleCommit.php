<?php
namespace common\models\data;

use Yii;

/**
* This is the data class for [[common\models\database\ArticleCommit]].
*
* @see \common\models\database\ArticleCommit
*/
class ArticleCommit extends \common\models\database\ArticleCommit
{

    const ARTICLECOMMIT_STATUS_WAITING_AUDIT = 0;
    const ARTICLECOMMIT_STATUS_AUDIT_PASS = 1;
    const ARTICLECOMMIT_STATUS_AUDIT_FAILED = 2;
    /**
     * @var array $status_code 状态，0，已发表，1评论成功，3非法评论，2审核不通过
     */
    public static $status_code = [0=>'Waiting audit',1=>'Audit Pass',2=>'Audit Failed',];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['status'], 'in', 'range' => [0,1,2,],],
        ]);
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        return [
            'default' => [
                'article_id',
                'user_id',
                'commit_id',
                'content',
                'status',
            ],
            'search' => [
                'id',
                'article_id',
                'user_id',
                'commit_id',
                'content',
                'status',
                'add_time',
            ],
            'frontend' => [
                'id',
                'article_id',
                'user_id',
                'commit_id',
                'content',
                'status',
                'add_time',
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
}
