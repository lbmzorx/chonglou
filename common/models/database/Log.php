<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%log}}".
 *
 * @property string $id
 * @property int $level 级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
 * @property string $category 分类
 * @property double $log_time 记录时间
 * @property string $prefix 前缀
 * @property string $message 信息
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level'], 'integer'],
            [['log_time'], 'number'],
            [['prefix', 'message'], 'string'],
            [['category'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'), //
            'level' => Yii::t('model', 'Level'), //级别.0x00=所有,0x01=致命错误,0x02=警告,0x04=信息,0x08=追踪,0x40=PROFILE,0x50=PROFILE_BEGIN,0x60=PROFILE_END
            'category' => Yii::t('model', 'Category'), //分类
            'log_time' => Yii::t('model', 'Log Time'), //记录时间
            'prefix' => Yii::t('model', 'Prefix'), //前缀
            'message' => Yii::t('model', 'Message'), //信息
        ];
    }
}


