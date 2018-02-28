<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%menu}}".
 *
 */
class Menu extends \common\models\database\Menu
{

    public static $type_code=[0=>'后台',1=>'前台'];
    public static $target_code=['_blank'=>'新窗口','_self'=>'本窗口'];
    public static $is_display_code=[0=>'否',1=>'是'];


    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules=[

        ];
        return \yii\helpers\ArrayHelper::merge(parent::rules(),$rules);
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $lables= [
            'type' => Yii::t('app', '菜单类型'),//.0后台,1前台
            'parent_id' => Yii::t('app', '上级菜单ID'),
            'target' => Yii::t('app', '打开方式'),//._blank新窗口,_self本窗口
            'is_display' => Yii::t('app', '是否显示'),//.0否,1是
        ];
        return \yii\helpers\ArrayHelper::merge(parent::attributeLabels(),$lables);
    }


    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['add_time'],
                    self::EVENT_BEFORE_UPDATE => ['edit_time'],
                ],
            ],
            'getStatusCode'=>[
                'class' => \common\component\StatusCode::className(),
            ],
        ];
    }
}
