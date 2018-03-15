<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property string $id
 * @property string $name 名称
 * @property int $frequence 频率
 * @property int $content_type 标签类型
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['frequence', 'content_type'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'), //
            'name' => Yii::t('model', 'Name'), //名称
            'frequence' => Yii::t('model', 'Frequence'), //频率
            'content_type' => Yii::t('model', 'Content Type'), //标签类型
        ];
    }
}


