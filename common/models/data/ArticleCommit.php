<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%article_commit}}".
 *
 */
class ArticleCommit extends \common\models\database\ArticleCommit
{

    public static $status_code=[0=>'已经发表',1=>'评论成功',2=>'非法评论',3=>'包含敏感字符',4=>'垃圾评论'];


    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules=[

        ];
        return \yii\helpers\ArrayHelper::merge(parent::rules(),$rules);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $lables= [
            'status' => Yii::t('app', '状态'), //，0，已发表，1评论成功，3非法评论，2审核不通过
        ];
        return \yii\helpers\ArrayHelper::merge(parent::attributeLabels(),$lables);
    }

    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['add_time'],
                ],
            ],
            'getStatusCode'=>[
                'class' => \common\component\StatusCode::className(),
            ],
        ];
    }
}
