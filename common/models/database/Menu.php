<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property string $id 自增id
 * @property string $sign 英语标识
 * @property int $app_type 菜单类型.0后台,1前台
 * @property int $position 位置，0左，1上
 * @property string $parent_id 上级菜单id
 * @property string $name 名称
 * @property string $url url地址
 * @property string $icon 图标
 * @property double $sort 排序
 * @property string $target 打开方式._blank新窗口,_self本窗口
 * @property int $is_absolute_url 是否绝对地址
 * @property int $is_display 是否显示.0否,1是
 * @property string $add_time 创建时间
 * @property string $edit_time 修改时间
 * @property int $top_id 顶部菜单
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
            [['app_type', 'position', 'parent_id', 'is_absolute_url', 'is_display', 'add_time', 'edit_time', 'top_id'], 'integer'],
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
            'id' => Yii::t('menu', '自增id'),
            'sign' => Yii::t('menu', '英语标识'),
            'app_type' => Yii::t('menu', '菜单类型'),//.0后台,1前台
            'position' => Yii::t('menu', '位置'),//，0左，1上
            'parent_id' => Yii::t('menu', '上级菜单id'),
            'name' => Yii::t('menu', '名称'),
            'url' => Yii::t('menu', 'url地址'),
            'icon' => Yii::t('menu', '图标'),
            'sort' => Yii::t('menu', '排序'),
            'target' => Yii::t('menu', '打开方式'),//._blank新窗口,_self本窗口
            'is_absolute_url' => Yii::t('menu', '是否绝对地址'),
            'is_display' => Yii::t('menu', '是否显示'),//.0否,1是
            'add_time' => Yii::t('menu', '创建时间'),
            'edit_time' => Yii::t('menu', '修改时间'),
            'top_id' => Yii::t('menu', '顶部菜单'),
        ];
    }
}
