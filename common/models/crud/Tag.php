<?php

namespace common\models\crud;

use Yii;
use common\models\data\Tag as TagModel;
/**
 * This is the model class for table "{{%tag}}".
 *
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
