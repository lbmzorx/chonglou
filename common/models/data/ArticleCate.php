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

    const ARTICLECATE_STATUS_UNAVAILABLE = 0;
    const ARTICLECATE_STATUS_ENABLE = 1;
    /**
     * @var array $status_code 状态.0未开启，1启用
     */
    public static $status_code = [0=>'Unavailable',1=>'Enable',];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['status'], 'in', 'range' => [0,1,],],
            [['name'], 'default', 'value' =>'0',],
            [['parent_id'], 'default', 'value' =>0,],
            [['level'], 'default', 'value' =>0,],
            [['path'], 'default', 'value' =>'0',],
            [['status'], 'default', 'value' =>1,],
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
                'parent_id',
                'level',
                'path',
                'status',
            ],
            'search' => [
                'id',
                'name',
                'parent_id',
                'level',
                'path',
                'status',
                'add_time',
                'edit_time',
            ],
            'frontend' => [
                'id',
                'name',
                'parent_id',
                'level',
                'path',
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
        ];
    }
}
