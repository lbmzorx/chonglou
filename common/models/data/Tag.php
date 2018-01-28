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
    public static function tableName()
    {
        return '{{%tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['frequence', 'content_type'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }


}
