<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%article_cate}}".
 *
 */
class ArticleCate extends \common\models\database\ArticleCate
{

    /**
     * @inheritdoc
     */

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
                'class' => \yii\behaviors\TimestampBehavior::className(),
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
