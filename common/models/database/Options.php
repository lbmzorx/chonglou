<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%options}}".
 *
 * @property string $id 自增id
 * @property string $type 类型.0系统,1自定义,2banner,3广告
 * @property string $name 标识符
 * @property string $value 值
 * @property int $input_type 输入框类型
 * @property int $autoload 自动加载.0否,1是
 * @property string $tips 提示备注信息
 * @property string $sort 排序
 */
class Options extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%options}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'input_type', 'autoload', 'sort'], 'integer'],
            [['name', 'value'], 'required'],
            [['value'], 'string'],
            [['name', 'tips'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'), //自增id
            'type' => Yii::t('model', 'Type'), //类型.0系统,1自定义,2banner,3广告
            'name' => Yii::t('model', 'Name'), //标识符
            'value' => Yii::t('model', 'Value'), //值
            'input_type' => Yii::t('model', 'Input Type'), //输入框类型
            'autoload' => Yii::t('model', 'Autoload'), //自动加载.0否,1是
            'tips' => Yii::t('model', 'Tips'), //提示备注信息
            'sort' => Yii::t('model', 'Sort'), //排序
        ];
    }
}


