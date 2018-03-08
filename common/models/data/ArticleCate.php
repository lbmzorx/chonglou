<?php
namespace common\models\data;

use Yii;

/**
* This is the data class for [[common\models\database\ArticleCate]].
*
* @see \common\models\database\ArticleCate
*/
class ArticleCate extends \common\models\database\ArticleCate
{

        
    public static $status_code = [0=>'warning',1=>'success',9=>'unknown',];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[

        ]);
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
        ];
    }
}
