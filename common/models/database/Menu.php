<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property string $id 自增id
 * @property string $sign 英语标识
 * @property int $type 菜单类型.0后台,1前台
 * @property string $parent_id 上级菜单id
 * @property string $name 名称
 * @property string $url url地址
 * @property string $icon 图标
 * @property double $sort 排序
 * @property string $target 打开方式._blank新窗口,_self本窗口
 * @property int $is_absolute_url 是否绝对地址
 * @property int $is_display 是否显示.0否,1是
 * @property string $add_time 创建时间
 * @property string $edit_time 最后修改时间
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sign', 'name', 'url', 'add_time'], 'required'],
            [['type', 'parent_id', 'is_absolute_url', 'is_display', 'add_time', 'edit_time'], 'integer'],
            [['sort'], 'number'],
            [['sign'], 'string', 'max' => 30],
            [['name', 'url', 'icon', 'target'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sign' => Yii::t('app', '英语标识'),
            'type' => Yii::t('app', '菜单类型.0后台,1前台'),
            'parent_id' => Yii::t('app', '上级菜单id'),
            'name' => Yii::t('app', '名称'),
            'url' => Yii::t('app', 'url地址'),
            'icon' => Yii::t('app', '图标'),
            'sort' => Yii::t('app', '排序'),
            'target' => Yii::t('app', '打开方式._blank新窗口,_self本窗口'),
            'is_absolute_url' => Yii::t('app', '是否绝对地址'),
            'is_display' => Yii::t('app', '是否显示.0否,1是'),
            'add_time' => Yii::t('app', '添加时间'),
            'edit_time' => Yii::t('app', '修改时间'),
        ];
    }
}
