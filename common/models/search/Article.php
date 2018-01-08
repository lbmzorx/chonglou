<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\data\Article as ArticleModel;

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
            [['id',],'integer'],
            [['cateName',],'string',],
            [['cateName',],'safe',],
        ];
        return array_merge($rules,parent::rules());
    }

    public function attributes()
    {
        return array_merge(parent::attributes(),['cateName']);
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ArticleModel::find()->alias('a');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'a.id' => $this->id,
            'a.add_admin_id' => $this->add_admin_id,
            'a.remain' => $this->remain,
            'a.publish' => $this->publish,
            'a.status' => $this->status,
            'a.add_time' => $this->add_time,
            'a.edit_time' => $this->edit_time,
        ]);
        $query->join('INNER JOIN',\common\models\data\ArticleCate::tableName().' c','c.id = a.cate_id');
        $query->andFilterWhere(['like','c.name',$this->cateName]);

        $query->andFilterWhere(['like', 'a.title', $this->title])
            ->andFilterWhere(['like', 'a.author', $this->author])
            ->andFilterWhere(['like', 'a.cover', $this->cover])
            ->andFilterWhere(['like', 'a.abstract', $this->abstract])
            ->andFilterWhere(['like', 'a.content', $this->content]);

        $dataProvider->sort->attributes['cateName'] =
            [
                'asc'=>['a.cate_id'=>SORT_ASC],
                'desc'=>['a.cate_id'=>SORT_DESC],
            ];

        return $dataProvider;
    }



}
