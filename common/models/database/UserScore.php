<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%user_score}}".
 *
 * @property string $id
 * @property string $user_id
 * @property string $wealth
 * @property string $prestige
 * @property string $score
 */
class UserScore extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_score}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'wealth', 'prestige', 'score'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'wealth' => Yii::t('app', 'Wealth'),
            'prestige' => Yii::t('app', 'Prestige'),
            'score' => Yii::t('app', 'Score'),
        ];
    }
}
