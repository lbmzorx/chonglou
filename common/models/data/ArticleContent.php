<?php
namespace common\models\data;

use Yii;

/**
* This is the data class for [[common\models\database\ArticleContent]].
*
* @see \common\models\database\ArticleContent
*/
class ArticleContent extends \common\models\database\ArticleContent
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
                'content',
            ],
            'search' => [
                'id',
                'content',
            ],
            'frontend' => [
                'id',
                'content',
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
        ];
    }
}
