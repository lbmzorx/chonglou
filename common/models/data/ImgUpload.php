<?php
namespace common\models\data;

use Yii;

/**
* This is the data class for [[common\models\database\ImgUpload]].
*
* @see \common\models\database\ImgUpload
*/
class ImgUpload extends \common\models\database\ImgUpload
{

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
    public function scenarios()
    {
        return [
            'default' => [
                'filePath',
                'user_id',
                'admin_id',
            ],
            'search' => [
                'id',
                'filePath',
                'add_time',
                'user_id',
                'admin_id',
            ],
            'frontend' => [
                'id',
                'filePath',
                'add_time',
                'user_id',
                'admin_id',
            ]
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
                ],
            ],
            'withOneUser'=>[
                'class' => \common\components\behaviors\WithOneUser::className(),
            ],
        ];
    }
}
