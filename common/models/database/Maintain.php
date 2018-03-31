<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%maintain}}".
 *
 * @property string $id
 * @property string $options_id 位置类型.0首页轮播,1侧栏1,2侧栏2
 * @property int $show_type 显示类型.0图片,2文字,3markdown
 * @property string $name 名称
 * @property string $value 值
 * @property string $sign 标识
 * @property string $url URL
 * @property string $info 备注
 * @property int $sort 排序
 * @property int $add_time 添加时间
 * @property int $edit_time 修改时间
 * @property int $status 状态.0禁用,1启用
 */
class Maintain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%maintain}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['options_id', 'show_type', 'sort', 'add_time', 'edit_time', 'status'], 'integer'],
            [['name', 'value', 'sign', 'url', 'info', 'sort'], 'required'],
            [['name', 'sign'], 'string', 'max' => 50],
            [['value', 'url', 'info'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'), //
            'options_id' => Yii::t('model', 'Options ID'), //位置类型.0首页轮播,1侧栏1,2侧栏2
            'show_type' => Yii::t('model', 'Show Type'), //显示类型.0图片,2文字,3markdown
            'name' => Yii::t('model', 'Name'), //名称
            'value' => Yii::t('model', 'Value'), //值
            'sign' => Yii::t('model', 'Sign'), //标识
            'url' => Yii::t('model', 'Url'), //URL
            'info' => Yii::t('model', 'Info'), //备注
            'sort' => Yii::t('model', 'Sort'), //排序
            'add_time' => Yii::t('model', 'Add Time'), //添加时间
            'edit_time' => Yii::t('model', 'Edit Time'), //修改时间
            'status' => Yii::t('model', 'Status'), //状态.0禁用,1启用
        ];
    }
}


