<?php

namespace common\models\crud;

use Yii;

/**
 * This is the model class for table "{{%article_collection}}".
 *
 */
class ArticleCollection extends \common\models\data\ArticleCollection
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $rules=[
            [['name'],'required'],
            [['parent_id',],'validateIn','message'=>Yii::t('app','父级选择错误'),'skipOnEmpty'=>true],
        ];
        return array_merge($rules,parent::rules());
    }

}
