<?php

namespace common\models\crub;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\search\Article as ArticleModel;

/**
 * Article represents the model behind the search form about `common\models\data\Article`.
 */
class Article extends ArticleModel
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

    public function getCate()
    {
        return $this->hasOne(ArticleCate::className(), ['id' => 'cate_id']);
    }
}
