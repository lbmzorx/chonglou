<?php

namespace common\models\data;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%admin}}".
 *
 */
class Admin extends \common\models\database\Admin
{

    public function rules()
    {
        $rules=[
            [['title','content','cate_id'],'required'],
        ];
        return array_merge($rules,parent::rules());
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['add_time'],
                    self::EVENT_BEFORE_UPDATE => ['edit_time'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }
}
