<?php

namespace common\models\data;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%article}}".
 *
 */
class Article extends \common\models\database\Article
{
    public static $publish_code=[0=>'未发布',1=>'发布'];
    public static $status_code=[0=>'未待审核',1=>'审核通过',2=>'审核不通过'];
    public static $remain_code=[0=>'未提醒',1=>'已经提醒'];


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
            'remain' => Yii::t('app', '提醒'),//,0未提醒，1已经提醒
            'publish' => Yii::t('app', '发布'),//,0不发布，1发布,2发布当前
            'status' => Yii::t('app', '状态'),//，0待审核,1审核通过,2正在审核,3审核不通过
        ];
        return \yii\helpers\ArrayHelper::merge(parent::attributeLabels(),$lables);
    }

    /**
     * @return array
     */
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
