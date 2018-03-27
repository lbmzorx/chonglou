<?php
namespace common\models\data;

use Yii;

/**
* This is the data class for [[common\models\database\AdminLog]].
*
* @see \common\models\database\AdminLog
*/
class AdminLog extends \common\models\database\AdminLog
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(),[
            [['route'], 'default', 'value' =>'',],
            [['edit_time'], 'default', 'value' =>'0',],
        ]);
    }

    /**
    * @inheritdoc
    */
    public function scenarios()
    {
        return [
            'default' => [
                'user_id',
                'route',
                'description',
            ],
            'search' => [
                'id',
                'user_id',
                'route',
                'description',
                'add_time',
                'edit_time',
            ],
            'frontend' => [
                'id',
                'user_id',
                'route',
                'description',
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
        'withOneUser'=>[
                'class' => \common\components\behaviors\WithOneUser::className(),
            ],
        ];
    }

    public function afterFind()
    {
        $this->description = str_replace([
            '{{%ADMIN_USER%}}',
            '{{%BY%}}',
            '{{%CREATED%}}',
            '{{%UPDATED%}}',
            '{{%DELETED%}}',
            '{{%ID%}}',
            '{{%RECORD%}}'
        ], [
            yii::t('app', 'Admin user'),
            yii::t('app', 'through'),
            yii::t('app', 'created'),
            yii::t('app', 'updated'),
            yii::t('app', 'deleted'),
            yii::t('app', 'id'),
            yii::t('app', 'record')
        ], $this->description);
        $this->description = preg_replace_callback('/\d{10}/', function ($matches) {
            return date('Y-m-d H:i:s', $matches[0]);
        }, $this->description);
    }

    /**
     * 删除日志不计入操作日志
     *
     * @return bool
     */
    public function afterDelete()
    {
        return false;
    }
}
