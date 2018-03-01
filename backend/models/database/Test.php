<?php

namespace backend\models\database;

use Yii;

/**
 * This is the model class for table "{{%test}}".
 *
 * @property string $id
 * @property string $name 名称
 * @property int $add_time 添加时间
 * @property int $edit_time 修改时间
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%test}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['add_time', 'edit_time'], 'integer'],
            [['name'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', '名称'),
            'add_time' => Yii::t('app', '添加时间'),
            'edit_time' => Yii::t('app', '修改时间'),
        ];
    }
}
