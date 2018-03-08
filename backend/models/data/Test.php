<?php
namespace backend\models\data\Test;

use Yii;

/**
* This is the data class for [[backend\models\database\Test]].
*
* @see \backend\models\database\Test
*/
class Test extends \backend\models\database\Test
{

    public static $status_code = [0=>'',1=>'',2=>''];
    
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
