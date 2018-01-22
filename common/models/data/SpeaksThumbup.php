<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%speaks_thumbup}}".
 *
 * @property string $id
 * @property string $speaks_id 说说ID
 * @property string $user_id 用户ID
 * @property string $add_time 添加时间
 */
class SpeaksThumbup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%speaks_thumbup}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['speaks_id', 'user_id', 'add_time'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'speaks_id' => Yii::t('app', '说说ID'),
            'user_id' => Yii::t('app', '用户ID'),
            'add_time' => Yii::t('app', '添加时间'),
        ];
    }
}
