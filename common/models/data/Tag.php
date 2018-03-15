<?php
namespace common\models\data;

use Yii;

/**
* This is the data class for [[common\models\database\Tag]].
*
* @see \common\models\database\Tag
*/
class Tag extends \common\models\database\Tag
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
                'name',
                'frequence',
                'content_type',
            ],
            'search' => [
                'id',
                'name',
                'frequence',
                'content_type',
            ],
            'frontend' => [
                'id',
                'name',
                'frequence',
                'content_type',
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

    }
