<?php

namespace common\models\database;

use Yii;

/**
 * This is the model class for table "{{%menu}}".
 *
 * @property string $id
 * @property int $app_type 菜单类型.0后台,1前台
 * @property int $position 位置。0左，1上
 * @property string $parent_id 上级菜单id
 * @property string $name 名称
 * @property string $name_en 英文名
 * @property string $url url地址
 * @property string $icon 图标
 * @property double $sort 排序
 * @property string $target 打开方式._blank新窗口,_self本窗口
 * @property int $is_absolute_url 是否绝对地址
 * @property int $is_display 是否显示.0否,1是
 * @property string $add_time 创建时间
 * @property string $edit_time 修改时间
 * @property int $top_id 顶部菜单
 * @property string $module 模块
 * @property string $controller 控制器
 * @property string $action 方法
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
            [['app_type', 'position', 'parent_id', 'is_absolute_url', 'is_display', 'add_time', 'edit_time', 'top_id'], 'integer'],
            [['name', 'url', 'add_time'], 'required'],
            [['sort'], 'number'],
            [['name','name_en', 'url', 'icon', 'target'], 'string', 'max' => 255],
            [['module', 'controller', 'action'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('model', 'ID'), //
            'app_type' => Yii::t('model', 'App Type'), //菜单类型.0后台,1前台
            'position' => Yii::t('model', 'Position'), //位置。0左，1上
            'parent_id' => Yii::t('model', 'Parent ID'), //上级菜单id
            'name' => Yii::t('model', 'Name'), //名称
            'name_en'=> Yii::t('model','name_en'),//英文名
            'url' => Yii::t('model', 'Url'), //url地址
            'icon' => Yii::t('model', 'Icon'), //图标
            'sort' => Yii::t('model', 'Sort'), //排序
            'target' => Yii::t('model', 'Target'), //打开方式._blank新窗口,_self本窗口
            'is_absolute_url' => Yii::t('model', 'Is Absolute Url'), //是否绝对地址
            'is_display' => Yii::t('model', 'Is Display'), //是否显示.0否,1是
            'add_time' => Yii::t('model', 'Add Time'), //创建时间
            'edit_time' => Yii::t('model', 'Edit Time'), //修改时间
            'top_id' => Yii::t('model', 'Top ID'), //顶部菜单
            'module' => Yii::t('model', 'Module'), //模块
            'controller' => Yii::t('model', 'Controller'), //控制器
            'action' => Yii::t('model', 'Action'), //方法
        ];
    }
}


