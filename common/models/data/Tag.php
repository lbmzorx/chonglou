<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%tag}}".
 *
 */
class Tag extends \common\models\database\Tag
{

    /**
     * $content_type_code
     * @var array
     */
    public static $content_type_code=[0=>'文章',1=>'说说',2=>'话题'];

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

        ];
        return \yii\helpers\ArrayHelper::merge(parent::attributeLabels(),$lables);
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'getStatusCode'=>[
                'class' => \common\component\StatusCode::className(),
            ],
        ];
    }
}
