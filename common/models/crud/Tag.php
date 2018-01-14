<?php

namespace common\models\crud;

use Yii;
use common\models\data\Tag as TagModel;
/**
 * This is the model class for table "{{%tag}}".
 *
 * @property string $id
 * @property string $name
 * @property int $frequence 频率
 */
class Tag extends TagModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules=[
            [['name',],'required'],
        ];
        return array_merge($rules,parent::rules());
    }

}
