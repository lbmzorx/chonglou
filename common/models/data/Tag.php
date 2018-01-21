<?php

namespace common\models\data;

use Yii;

/**
 * This is the model class for table "{{%tag}}".
 *
 * @property string $id
 * @property string $name
 * @property int $frequence 频率
 * @property int $content_type 标签类型
 */
class Tag extends \yii\db\ActiveRecord
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

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'frequence' => Yii::t('app', '频率'),
            'content_type' => Yii::t('app', '标签类型'),
        ];
    }
}
