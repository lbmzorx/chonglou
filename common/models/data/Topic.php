<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%topic}}".
 *
 */
class Topic extends \common\models\database\Topic
{

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
            'remain' => Yii::t('app', '提醒'), //,0未提醒，1已经提醒
            'publish' => Yii::t('app', '发布'),//,0不发布，1发布,2发布当前
            'status' => Yii::t('app', '状态值'),//，0待审核,1审核通过,2正在审核,3审核不通过
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

}
