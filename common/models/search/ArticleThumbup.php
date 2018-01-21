<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\data\ArticleThumbup as ArticleThumbupModel;

/**
 * ArticleThumbup represents the model behind the search form of `common\models\data\ArticleThumbup`.
 */
class ArticleThumbup extends ArticleThumbupModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'article_id', 'user_id', 'add_time'], 'integer'],
        ];
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
        $query = ArticleThumbupModel::find();

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
            'id' => $this->id,
            'article_id' => $this->article_id,
            'user_id' => $this->user_id,
            'add_time' => $this->add_time,
        ]);

        return $dataProvider;
    }
}
